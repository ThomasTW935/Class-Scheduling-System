<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $result = $roomsView->FetchRoomByID($id);
   $room = $result[0];
   $button = "update";
}
?>

<form action='./includes/rooms.inc.php' class='module__Form' method='POST'>
   <a href="rooms.php" class='form__Close'>X</a>
   <label for='formSelect' class='form__Title'>Room's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $room['rm_id'] ?? '' ?>' name='id'>
   <div class="form__Container">
      <label for='' class='form__Label'>Name:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $room['rm_name'] ?? '' ?>' name='name' placeholder='Room Name' required>
         <div class="form__Error"><?php echo $errors['name'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Description:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $room['rm_desc'] ?? '' ?>' name='desc' placeholder='Room Description' required>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Floor:</label>
      <div class="form__Input">
         <input class='form__Input' type='number' value='<?php echo $room['rm_floor'] ?? '' ?>' name='floor' placeholder='Floor' required>
         <div class="form__Error"><?php echo $errors['floor'] ?? '' ?></div>
      </div>
   </div>
   <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="rooms.php" class='module__formBackground'></a>