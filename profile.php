<?php

include_once './layouts/__header.php';
$success = (isset($_GET['success'])) ? "Successfully changed password!" : '';

?>

<main class='profile '>
  <div>
    <h3>Email</h3>
    <form></form>
  </div>
  <div>
    <h3>Password</h3>
    <form class='' action='./includes/profile.inc.php' method='POST'>
      <input type="hidden" name="id" value='<?php echo $sessionID ?>'>
      <span class='success'><?php echo $success ?></span>
      <label for="current">Current Password</label>
      <input class='' type="password" name="current-password" id="current" required>
      <span class='error'></span>
      <label for="new">New Password</label>
      <input class='' type="password" name="new-password" id="new" required>
      <span class='error'></span>
      <label for="confirm">Re-type new Password</label>
      <input class='' type="password" name="confirm-password" id="confirm" required>
      <span class='error' id='errorConfirm'></span>
      <button class='' name='changePass'>Change Password</button>
    </form>
  </div>
</main>

<?php
include_once './layouts/__footer.php';
?>