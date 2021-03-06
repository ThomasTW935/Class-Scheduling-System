<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);


$errorUsername = $errors['errorUsername'] ?? '';
$errorEmail = $errors['errorEmail'] ?? '';
$errorPassword = $errors['errorPassword'] ?? '';

$userID = '';
$username = $errors['username'] ?? '';
$email = $errors['email'] ?? '';
$password = '';
$roleLevel = $errors['roleLevel'] ?? '';
if (isset($_GET['id'])) {
   $userID = $_GET['id'];
   $result = $usersView->FetchUserByID($userID);
   $user = $result[0];
   $button = "update";
   $username = $user['username'];
   $email = $user['email'];
   $password = $user['password'];
   $resetPassword = "<button type='submit' name='reset-password' class='form__Button btn__Secondary'>Reset Password</button>";
}
?>

<form action='./includes/users.inc.php' class='module__Form' method='POST'>
   <section class="form__Title">
      <label>User's Information</label>
      <a href="users.php?page=<?php echo $page ?>">X</a>
   </section>
   <input class='form__Input' type='hidden' value='<?php echo $page ?>' name='page'>
   <input class='form__Input' type='hidden' value='<?php echo $userID ?>' name='userID'>
   <div class="form__Container">
      <label for='' class='form__Label'>Username:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $username ?>' name='username' required>
         <div class="form__Error"><?php echo $errorUsername ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Email:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $email ?>' name='email' autocomplete="0">
         <div class="form__Error"><?php echo $errorEmail ?></div>
      </div>
   </div>
   <?php

   if (!isset($_GET['id'])) {
      echo "<div class='form__Container'>
         <label for='' class='form__Label'>Password:</label>
         <div class='form__Input'>
            <input class='form__Input' type='password' name='new-password' autocomplete='0' required>
            <div class='form__Error'>$errorPassword</div>
         </div>
      </div>";
   }

   ?>

   <?php

   echo "<div class='btn__Container'>";
   echo "<button class='form__Button button' type='submit' name='$button'>$button</button>";
   echo $resetPassword ?? "";
   echo "</div>";
   ?>
</form>
<a href="users.php?page=<?php echo $page ?>" class='module__formBackground'></a>