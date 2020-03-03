<?php

include './autoloader.inc.php';

$usersView = new UsersView();
$username = $_POST['username'];
$password = $_POST['password'];
$result = $usersView->FetchUserByUsername($username);

if (isset($_POST['login-Username'])) {

   if (empty($result)) {
      $error = "username";
      header("Location: ../index.php?error=$error");
      exit();
   }
   header("Location: ../index.php?username=admin");
} else if (isset($_POST['login-Password'])) {

   $user = $result[0];
   $passwordReal = $user['password'];

   $passCheck = password_verify($password, $passwordReal);

   if ($passCheck) {
      session_start();
      $_SESSION['id'] = $user['user_id'];
      $_SESSION['type'] = $user['role_level'];
      header("Location: ../dashboard.php?signin=success");
   } else {
      $error = "password";
      header("Location: ../index.php?error=$error&username=$username");
   }
}
