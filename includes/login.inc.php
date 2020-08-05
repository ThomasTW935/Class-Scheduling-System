<?php

include './autoloader.inc.php';


if (!isset($_POST)) {
   header('Location: ../index.php');
}

if (isset($_POST['submit'])) {

   $usersView = new UsersView();
   $loginVal = new loginVal($_POST);
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
   $result = $usersView->FetchUserByUsername($username);
   $user = $result[0];
   foreach ($user as $key => $value) {
      echo "<h2>$key: $value</h2>";
   }
   session_start();
   $_SESSION['id'] = $user['user_id'];
   $_SESSION['type'] = $user['role_level'];
   header("Location: ../dashboard.php?signin=success");
}


echo "<h1>Hello</h1>";
