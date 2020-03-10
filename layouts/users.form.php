<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $result = $usersView->FetchUserByID($id);
   $user = $result[0];
   $button = "update";
}
?>

<form action='./includes/users.inc.php' class='module__Form' method='POST'>
   <a href="users.php" class='form__Close'>X</a>
   <label for='formSelect' class='form__Title'>User's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $user['user_id'] ?? '' ?>' name='userID'>
   <div class="form__Container">
      <label for='' class='form__Label'>Username:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $user['username'] ?? '' ?>' name='username' required>
         <div class="form__Error"><?php echo $errors['errorUsername'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Email:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $user['email'] ?? '' ?>' name='email'>
         <div class="form__Error"><?php echo $errors['errorEmail'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Password:</label>
      <div class="form__Input">
         <input class='form__Input' type='password' value='<?php echo $user['password'] ?? '' ?>' name='password'>
         <div class="form__Error"><?php echo $errors['errorPassword'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Role Level:</label>
      <div class="form__Input">
         <input class='form__Input' type='number' value='<?php echo $user['role_level'] ?? '' ?>' name='roleLevel'>
         <div class="form__Error"><?php echo $errors['errorRolelevel'] ?? '' ?></div>
      </div>
   </div>
   <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="users.php" class='module__formBackground'></a>