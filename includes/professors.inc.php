<?php

if (!isset($_POST)) {
   header('Location: ../dashboard.php');
   exit();
}

include 'autoloader.inc.php';

$profView = new ProfessorsView();
$profContr = new ProfessorsContr();
$profVal = new ProfessorsVal($_POST);

$usersContr = new UsersContr();
$usersView = new UsersView();

$page = $_POST['page'];
$destination = "page=$page";

if (!isset($_POST['submitStatus'])) {
   $isFrom = (isset($_POST['submit'])) ? 'submit' : 'update';
   $password = (!isset($_POST['password'])) ? "{$_POST['lastName']}.{$_POST['empID']}" : $_POST['password'];
   $data = ['id' => $_POST['userID'], 'username' => $_POST['username'], 'email' => $_POST['email'], 'new-password' => $password, 'roleLevel' => 1, $isFrom => ''];
   $usersVal = new UsersVal($data);
   $middleInitial = explode('.', $_POST['middleInitial']);
   $_POST['middleInitial'] = strtoupper(implode('', $middleInitial));
   $errors = $profVal->validateForm();
   $errors += $usersVal->validateForm();

   $imgFile = $_FILES['image'];
   $imgName = $imgFile['name'];
   $imgError = $imgFile['error'];
   $imgFullName = '';
   if ($imgError != 4) {
      $imgNameArray = explode('.', $imgName);
      $imgExt = strtolower(end($imgNameArray));
      $imgFullName = $_POST['lastName'] . '.' . uniqid() . '.' . $imgExt;
   }
   if ($imgFullName) {
      $_POST += ['image' => $imgFullName];
   } else {
      $_POST += ['image' => $_POST['imgName']];
   }
   if (!empty($errors)) {
      $func = new Functions();
      $query = $func->BuildQuery($errors, $_POST);
      $destination .= (isset($_POST['submit'])) ? "&add" : "&id={$_POST['profID']}";
      header('Location: ../professors.php?' . $destination . $query);
      exit();
   }
}


if (isset($_POST['submit'])) {

   $usersContr->CreateUser($data);
   $result = $usersView->FetchUserByUsername($_POST['username']);
   $id = $result[0]['user_id'];
   $_POST['userID'] = $id;
   $profContr->CreateProfessors($_POST);
   $prof = $profView->FetchProfessorByLatest();
   $profID = $prof[0]["id"];
   $schedContr = new SchedulesContr();
   $schedContr->CreateDisplayTime("prof", $profID);
} else if (isset($_POST['update'])) {

   $usersContr->ModifyUser($data);
   $profContr->ModifyProfessor($_POST);
} else if (isset($_POST['submitStatus'])) {
   $state = ($_POST['state'] == 0) ? 1 : 0;
   $profContr->ModifyProfessorState($state, $_POST['id']);
   $usersContr->ModifyUserState($state, $_POST['userID']);
   $isArchived = ($_POST['state'] == 0) ? 'archive&' : '';
   $destination = $isArchived . $destination;
}

if ($imgError != 4 && !isset($_POST['submitStatus'])) {
   $imgDestination = "../drawables/images/" . $imgFullName;
   $imgTempname = $imgFile['tmp_name'];
   move_uploaded_file($imgTempname, $imgDestination);
}
header('Location: ../professors.php?' . $destination);
