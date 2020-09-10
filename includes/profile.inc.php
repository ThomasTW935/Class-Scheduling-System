<?php

if (!isset($_POST)) {
  header("Location: ../index.php");
  exit();
}

include_once "./autoloader.inc.php";
$profileVal = new ProfileVal($_POST);
$errors = $profileVal->validateForm();
if (isset($_POST['changePass'])) {
  if (!empty($errors)) {
    $func = new Functions();
    $query = $func->BuildQuery($errors, $_POST);
    header("Location: ../profile.php?" . $query);
    exit();
  }
  $userContr = new UsersContr();
  $userContr->ModifyPassword($_POST);
}
header("Location: ../profile.php?success");
