<?php
$error="";
if(isset($_POST['login-Username'])){

   $username = $_POST['username'];
   echo $username; 
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
   if($password == "admin"){
      session_start();
      $_SESSION['admin'] = true;
      header("Location: ../index.php?signin=success");
      exit();
   } else {
      $error = "password";
      header("Location: ../login.php?error=$error");
      exit();
   }
}
 else {
   header("Location: ../studentview.php");
   exit();
}
