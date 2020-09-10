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
   $_POST['new-password'] = 'STICubao005';
   $isFrom = (isset($_POST['submit'])) ? 'submit' : 'update';
   // $password = (!isset($_POST['password'])) ? "{$_POST['lastName']}.{$_POST['empID']}" : $_POST['new-password'];
   $data = ['id' => $_POST['userID'], 'username' => $_POST['empID'], 'email' => $_POST['email'], 'new-password' => $_POST['new-password'], $isFrom => ''];
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
      if (empty($_POST['imgName'])) {
         $_POST += ['image' => null];
      } else {
         $_POST += ['image' => $_POST['imgName']];
      }
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

   $profContr->CreateProfessors($_POST);
} else if (isset($_POST['update'])) {

   $usersContr->ModifyUser($data);
   $profContr->ModifyProfessor($_POST);
} else if (isset($_POST['submitStatus'])) {
   $state = ($_POST['state'] == 0) ? 1 : 0;
   $profContr->ModifyProfessorState($state, $_POST['profID'], $_POST['schoolYearID']);
   $isArchived = ($_POST['state'] == 0) ? 'archive&' : '';
   $destination = $isArchived . $destination;
}

if ($imgError != 4 && !isset($_POST['submitStatus'])) {
   $imgDestination = "../drawables/images/" . $imgFullName;
   $imgTempname = $imgFile['tmp_name'];
   move_uploaded_file($imgTempname, $imgDestination);
}
header('Location: ../professors.php?' . $destination);
