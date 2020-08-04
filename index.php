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
      <label class="form__Title">Sign in</label>
      <section>
         <label for='usename'>Username:</label>
         <input type="text" name="username" id="username" autofocus autocomplete="username" required>
      </section>
      <section>
         <label for='password'>Password:</label>
         <input type="password" name="current-password" id="password" autocomplete="off" required>
      </section>
      <button class="form__Button" type="submit" name="submit">Sign in</button>
   </form>
</body>

</html>