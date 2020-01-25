<?php
if(isset($_POST['login-Submit'])){
   
   $username = $_POST['username'];
   $password = $_POST['password'];
   if($username == "admin" && $password == "admin"){
      session_start();
      $_SESSION['admin'] = true;
      header("Location: ../index.php");
   } else {
      header("Location: ../login.php");
      exit();
   }
} else {
   header("Location: ../studentview.php");
   exit();
}
