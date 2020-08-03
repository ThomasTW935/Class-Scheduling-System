<?php
$error = $_GET['error'] ?? '';
$errorMessage = '';
if ($error == 'username') {
   $errorMessage = 'Username not found.';
} elseif ($error == 'password') {
   $errorMessage = 'Password Incorrect.';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login</title>
   <link rel="stylesheet" href="styles/index.css">
</head>

<body>
   <form class="form" action="includes/login.inc.php" method="POST">
      <div class="form__Message">
         <label class="form__Label">Sign in</label>
      </div>
      <div class="form__Groups">
         <div class="form__Group">
            <input type="text" class="form__Field" placeholder="Username" id='username' name="username" autofocus autocomplete='off'>
            <label for='username' class="form__Label--placeholder">Username</label>
         </div>
         <span class="form__Error"><?php echo $errorMessage ?></span>
      </div>
      <div class="form__Groups">
         <div class="form__Group">
            <input type="password" class="form__Field form__Signin--display" placeholder="Password" id='password' name="password">
            <label for="password" class="form__Label--placeholder form__Signin--display">Password</label>
         </div>
         <span class="form__Error"><?php echo $errorMessage ?></span>
      </div>
      <button class="form__Button" type="submit" name="submit">Submit</button>
   </form>
   <?php

   // if (isset($_GET['test'])) {

   //    echo "<div class='module'>
   //    <form class='module__Form'>";

   //    $values = ['Hush', 'Daryl', 'Christine'];
   //    foreach ($values as $value) {
   //       echo  "<input type='text' placeholder='" . $value . "'>";
   //    }
   //    echo "</form><div class='module__formBackground'></div>
   //    </div>";
   // }

   ?>
</body>

</html>