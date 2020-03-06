<?php

include './autoloader.inc.php';

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
}

$usersView = new UsersView();
$usersContr = new UsersContr();
$usersVal = new UsersVal($_POST);

if (!isset($_POST['submitStatus'])) {
  $errors = $usersVal->validateForm();

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
    header('Location: ../users.php?add' . $query);
    exit();
  }
  $usersContr->CreateUser($_POST);
} else if (isset($_POST['update'])) {
  if (!empty($errors)) {
    header('Location: ../users.php?id=' . $_POST['userID'] . ' & '  . $query);
    exit();
  }
  $usersContr->ModifyUser($_POST);
} else if (isset($_POST['submitStatus'])) {
  $status = ($_POST['status'] == 0) ? 1 : 0;
  $usersContr->ModifyUserState($status, $_POST['userID']);
}

header('Location: ../users.php');
