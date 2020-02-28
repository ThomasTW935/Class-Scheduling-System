<?php
   session_start();
   $display = "autofocus";
   $buttonName = "login-Username";
   if(isset($_GET['username'])){
      $username = $_GET['username'];
      $disabled = "disabled";
      $buttonName = "login-Password";
      $display = " value='$username' ";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link rel="stylesheet" href="styles/login.css">
   <script defer src="./scripts/login.js"></script>
</head>
<body>   
   
</body>
</html>