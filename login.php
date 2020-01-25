<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link rel="stylesheet" href="styles/login.css">
</head>
<body>   
   <form action="includes/login.inc.php" method="POST">
      <input class="form__Input--text" type="text" name="username" placeholder="Username" required>
      <input class="form__Input--pass" type="password" name="password" placeholder="Password" required>
      <div>
         <button type="submit" name="login-Submit">SUBMIT</button>
         <a href="./studentview.php">CANCEL</a>
      </div>
   </form>
</body>
</html>