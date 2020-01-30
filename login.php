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
   <form class="form" action="includes/login.inc.php" method="POST">
      <label class="form__Label">Sign in</label>
      <input class="form__Input" type="text" name="username" placeholder="Username" required>
      <!-- <input class="form__Input" type="password" name="password" placeholder="Password" required> -->
      <button  class="form__Button" type="submit" name="login-Submit">NEXT</button>
   </form>
</body>
</html>