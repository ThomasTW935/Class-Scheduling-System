<?php

include './autoloader.inc.php';


if (!isset($_POST)) {
   header('Location: ../index.php');
}

if (isset($_POST['submit'])) {


   $loginVal = new LoginVal($_POST);
   $errors = $loginVal->validateForm();
   if (!empty($errors)) {
      foreach ($errors as $errorKey => $errorValue) {
         foreach ($_POST as $key => $value) {
            $needle = strtolower($key);
            $haystack = strtolower($errorKey);
            if ((strpos($haystack, $needle) !== false) || $key === 'current-password') {
               unset($_POST[$key]);
            }
         }
      }
      $query = '&' . http_build_query($errors) . '&' . http_build_query($_POST);
      header("Location: ../index.php?$query");
      exit();
   }
   $usersView = new UsersView();
   $result = $usersView->FetchUserByUsername($_POST['username']);
   $user = $result[0];
   foreach ($user as $key => $value) {
      echo "<h2>$key: $value</h2>";
   }
   session_start();
   $_SESSION['id'] = $user['user_id'];
   $_SESSION['username'] = $user['username'];
   $_SESSION['type'] = $user['role_level'];
   $destination = ($_SESSION['type'] == 1) ? "scheduleview" : "dashboard";
   header("Location: ../$destination.php?signin=success");
}
