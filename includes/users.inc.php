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
    include_once './functions.inc.php';
    $query = BuildQuery($errors, $_POST);
    $destination = (isset($_POST['submit'])) ? 'add' : "id={$_POST['userID']}";
    header("Location: ../users.php?$destination" . $query);
    exit();
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
  $state = ($_POST['state'] == 0) ? 1 : 0;
  $usersContr->ModifyUserState($state, $_POST['userID']);
  $destination = ($_POST['state'] == 0) ? '?archive' : '';
}
header('Location: ../users.php' . $destination);
