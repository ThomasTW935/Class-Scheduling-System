<?php

include './autoloader.inc.php';


if (!isset($_POST)) {
   header('Location: ../index.php');
}

if (isset($_POST['submit'])) {

   $usersView = new UsersView();
   $loginVal = new loginVal($_POST);
   $username = $_POST['username'];
   $password = $_POST['password'];

   $errors = $loginVal->validateForm();
   if (!empty($errors)) {
      $query = '&' . http_build_query($errors);
      header("Location: ../index.php?error$query");
      exit();
   }
   $result = $usersView->FetchUserByUsername($username);
   $user = $result[0];
   session_start();
   $_SESSION['id'] = $user['user_id'];
   $_SESSION['type'] = $user['role_level'];
   var_dump($_SESSION);
   header("Location: ../dashboard.php?signin=success");
}
