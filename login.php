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
      <div class="form__Input">
         <label for="input-username" class="form__Label--focus  form__Signin--hide">Username</label>
         <input class="form__Input form__Signin--hide" id="input-username" type="text" name="username" <?php echo $display ?>>
         <label for="input-password" class="form__Label--focus form__Signin--display">Password</label>
         <input class="form__Input form__Signin--display" id="input-password" type="password" name="password" autofocus>
         <span class="form__Error"></span>
      </div>
      <button class="form__Button" type="submit" name="<?php echo $buttonName ?>">NEXT</button>
   </form>
</body>
</html>