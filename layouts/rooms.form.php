<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
$errorName = $errors['errorName'] ?? '';

$rmID = '';
$name = '';
$desc = $errors['desc'] ?? 'Lecture Room';
$floor = $errors['floor'] ?? '';
$type = $errors['is_laboratory'] ?? '';
$isHidden = 'invisible';

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $result = $roomsView->FetchRoomByID($id);
   $room = $result[0];
   $button = "update";
   $rmID = $room['rm_id'];
   $name = $room['rm_name'];
   $desc = $room['rm_desc'];
   $floor = $room['rm_floor'];
   $type = $room['is_laboratory'];
   $isHidden = ($room['is_laboratory'] == 0) ? 'invisible' : '';
}
$setFloors = ["Ground Floor", "2nd Floor", "3rd Floor", "4th Floor", "5th Floor", "6th Floor", "7th Floor", "8th Floor"];
?>

<form action='./includes/rooms.inc.php' class='module__Form' method='POST'>
   <section class="form__Title">
      <label>Room's Information</label>
      <a href="rooms.php?page=<?php echo $page ?>">X</a>
   </section>
   <input class='form__Input' type='hidden' value='<?php echo $page ?>' name='page'>
   <input class='form__Input' type='hidden' value='<?php echo $rmID ?>' name='rmID'>
   <div class="form__Container">
      <label for='' class='form__Label'>Room Name:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $name ?>' name='name' required>
         <div class="form__Error"><?php echo $errorName ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Type:</label>
      <div class="form__Radio" id='roomType-Con'>
         <?php

         $types = ["Lecture", "Laboratory"];
         for ($i = 0; $i < sizeof($types); $i++) {
            $selOpt = ($type == $i) ? 'checked' : '';
            echo "<input type='radio' name='type' id='$types[$i]' value='$i' $selOpt>";
            echo "<label for='$types[$i]'>$types[$i]</label>";
         }

         ?>
      </div>
   </div>
   <div <?php echo "class='form__Container $isHidden'" ?> id='roomDesc-Con'>
      <label for="" class="form__Label">Description:</label>
      <div class="form__Input">
         <input class='form__Input' id='roomDesc-Input' list='roomTypes' type='text' value='<?php echo $desc ?>' name='desc' required autocomplete="off">
         <datalist id='roomTypes'>
            <?php

            $roomTypes = $roomsView->FetchRoomTypes();
            foreach ($roomTypes as $roomType) {
               echo "<option value='{$roomType['rm_desc']}'>{$roomType['rm_desc']}</option>";
            }


            ?>
         </datalist>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Floor:</label>
      <div class="form__Input">
         <select name='floor'>
            <?php

            for ($i = 0; $i < count($setFloors); $i++) {
               $selected = ($floor == $setFloors[$i]) ? 'selected' : '';
               echo "<option value='{$setFloors[$i]}' $selected>{$setFloors[$i]}</option>";
            }

            ?>
         </select>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Max Capacity:</label>
      <div class="form__Input">
         <select name="capacity" id="">
            <option value="30">30 people</option>
            <option value="50">50 people</option>
         </select>
      </div>
   </div>
   <button class='form__Button button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="rooms.php?page=<?php echo $page ?>" class='module__formBackground'></a>