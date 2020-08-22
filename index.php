<?php
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
parse_str($query, $errors);
$errorPassword = (isset($errors['errorPassword'])) ? "*{$errors['errorPassword']}" : '';
$errorUsername = (isset($errors['errorUsername'])) ? "*{$errors['errorUsername']}" : '';
$username = (isset($errors['username'])) ? "{$errors['username']}" : '';
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
      <section class="form__Title">
         <label>Log in</label>
      </section>
      <fieldset class='form__Content'>
         <label for='usename'>User ID</label>
         <input type="text" name="username" id="username" value='<?php echo $username ?>' autofocus autocomplete="username" required>
         <span class='error'><?php echo "$errorUsername"; ?></span>
         <label for='password'>Password</label>
         <input type="password" name="current-password" id="password" autocomplete="off" required>
         <span class='error'><?php echo "$errorPassword"; ?></span>
         <button class="form__Button" type="submit" name="submit">Log in</button>
      </fieldset>
   </form>
   <div class='form__Background'></div>
</body>

</html>