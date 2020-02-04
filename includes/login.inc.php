<?php
$error="";
$username = "";
$password = "";
if(isset($_POST['login-Username'])){

   $username = $_POST['username'];
   if($username == "admin"){  
      header("Location: ../login.php?username=admin");
      exit();
   } else{
      $error = "username";
      header("Location: ../login.php?error=$error");
      exit();
   }
} else if(isset($_POST['login-Password'])){
   $password = $_POST['password'];
   $username = $_POST['username'];
   if($password == "admin"){
      session_start();
      $_SESSION['admin'] = true;
      header("Location: ../admin.php?signin=success");
      exit();
   } else {
      $error = "password";
      header("Location: ../login.php?error=$error&username=$username");
      exit();
   }
}
 else {
   header("Location: ../index.php");
   exit();
}
