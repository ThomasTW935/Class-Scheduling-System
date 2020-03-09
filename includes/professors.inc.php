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


if (!isset($_POST['submitStatus'])) {
   $isFrom = (isset($_POST['submit'])) ? 'submit' : 'update';
   $password = (!isset($_POST['password'])) ? "{$_POST['lastName']}.{$_POST['empID']}" : $_POST['password'];
   $data = ['id' => $_POST['userID'], 'username' => $_POST['username'], 'email' => $_POST['email'], 'password' => $password, 'roleLevel' => 1, $isFrom => ''];
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
   $_POST += ['image' => $imgFullName];


   if (!empty($errors)) {
      foreach ($errors as $errorKey => $errorValue) {
         foreach ($_POST as $key => $value) {
            $needle = strtolower($key);
            $haystack = strtolower($errorKey);
            if ((strpos($haystack, $needle) !== false)) {
               unset($_POST[$key]);
            }
         }
      }
      $query = '&' . http_build_query($errors) . '&' . http_build_query($_POST);
   }
}

if (isset($_POST['submit'])) {

   if (!empty($errors)) {
      header('Location: ../professors.php?add' . $query);
      exit();
   }
   $usersContr->CreateUser($data);
   $result = $usersView->FetchUserByUsername($_POST['username']);
   $id = $result[0]['user_id'];
   $_POST['userID'] = $id;
   $profContr->CreateProfessors($_POST);
} else if (isset($_POST['update'])) {

   if (!empty($errors)) {
      header('Location: ../professors.php?id=' . $_POST['profID'] . $query);
      exit();
   }
   $usersContr->ModifyUser($data);
   $profContr->ModifyProfessor($_POST);
} else if (isset($_POST['submitStatus'])) {
   $state = ($_POST['state'] == 0) ? 1 : 0;
   $profContr->ModifyProfessorState($state, $_POST['id']);
   $usersContr->ModifyUserState($state, $_POST['userID']);
   var_dump($_POST);
}


if ($imgError != 4 && !isset($_POST['submitStatus'])) {
   $imgDestination = "../drawables/images/" . $imgFullName;
   $imgTempname = $imgFile['tmp_name'];
   move_uploaded_file($imgTempname, $imgDestination);
}
header('Location: ../professors.php');
