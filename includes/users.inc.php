<?php

include './autoloader.inc.php';

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
}

$usersView = new UsersView();
$usersContr = new UsersContr();
$usersVal = new UsersVal($_POST);

if (!isset($_POST['delete'])) {
  $errors = $deptVal->validateForm();
  $query = '&' . http_build_query($errors);
}

if ($_POST['submit']) {
  if (!empty($errors)) {
    header('Location: ../users?add' . $query);
    exit();
  }
  $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $_POST['password'] = $passHash;
  $usersContr->CreateUser($_POST);
} else if ($_POST['update']) {
  if (!empty($errors)) {
    header('Location: ../users?id=' . $_POST['id'] . ' & '  . $query);
    exit();
  }
  $usersContr->ModifyUser($_POST);
} else if ($_POST['delete']) {
  $usersContr->RemoveUser($_POST['id']);
}
