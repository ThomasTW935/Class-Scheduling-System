<?php

include_once './layouts/__header.php';
?>

<main class='profile '>
  <div>
    <h3>Email</h3>
    <form></form>
  </div>
  <div>
    <h3>Password</h3>
    <form class=''>
      <label for="current">Current Password</label>
      <input class='' type="password" name="current-password" id="current">
      <span class='error'></span>
      <label for="new">New Password</label>
      <input class='' type="password" name="new-password" id="new">
      <span class='error'></span>
      <label for="confirm">Re-type new Password</label>
      <input class='' type="password" name="confirm-password" id="confirm">
      <span class='error' id='errorConfirm'></span>
      <button class=''>Change Password</button>
    </form>
  </div>
</main>

<?php
include_once './layouts/__footer.php';
?>