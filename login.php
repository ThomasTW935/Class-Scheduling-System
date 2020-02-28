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
   <form class="form" action="includes/login.inc.php" method="POST">
      <div class="form__Message">
         <label class="form__Label">Sign in</label>
         <p class="form__Signin--display">as <span></span></p>
      </div>
      <div class="form__Groups">
         <div class="form__Group form__Signin--hide">
            <input type="text"  class="form__Field" placeholder="Username" id='username' name="username" <?php echo $display ?>>
            <label for='username' class="form__Label--placeholder">Username</label>
         </div>
         <div class="form__Group form__Signin--display">
            <input type="password" class="form__Field form__Signin--display" placeholder="Password" id='password'  name="password" autofocus>
            <label for="password" class="form__Label--placeholder form__Signin--display">Password</label>
         </div>
         <span class="form__Error"></span>
      </div>
      <button class="form__Button" type="submit" name="<?php echo $buttonName ?>">NEXT</button>
   </form>
</body>
</html>