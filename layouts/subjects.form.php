<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);

$errorCode = $errors['errorCode'] ?? '';

$subjID = '';
$code = $errors['code'] ?? '';
$desc = $errors['desc'] ?? '';
$units = $errors['units'] ?? '1';
if (isset($_GET['id'])) {
   $subjID = $_GET['id'];
   $result = $subjView->FetchSubjectByID($subjID);
   $subj = $result[0];
   $button = "update";
   $code = $subj['subj_code'];
   $desc = $subj['subj_desc'];
   $units = $subj['units'];
}
?>

<form action='./includes/subjects.inc.php' class='module__Form' method='POST'>
   <section class="form__Title">
      <label for='formSelect' class='form__Title'>Subject's Information</label>
      <a href="subjects.php?page=<?php echo $page ?>">X</a>
   </section>
   <input class='form__Input' type='hidden' value='<?php echo $page ?>' name='page'>
   <input class='form__Input' type='hidden' value='<?php echo $subjID ?>' name='subjID'>
   <div class="form__RadioCon">
      <label for="" class="form__Label"></label>
      <div class="form__Input">
         <input type="radio" name="" id="" checked>
         <label for="lecture">Lecture</label>
         <input type="radio" name="" id="laboratory">
         <label for="laboratory">Laboratory</label>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Code:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $code ?>' name='code' required>
         <div class="form__Error"><?php echo $errorCode ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Description:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $desc ?>' name='desc' required>
      </div>
   </div>

   <div class="form__Container">
      <label for="" class="form__Label">Unit/s:</label>
      <div class="form__Input">
         <input class='form__Input' type='number' value='<?php echo $units ?>' min='1' max='15' name='units' required>
      </div>
   </div>
   <div class="form__Container">
      <label for="type" class="form__Label">Type:</label>
      <div class="form__Input">
         <select name="type" id="type">
            <?php

            $types = ['Core', 'Minor', 'General Education'];
            for ($i = 0; $i < sizeof($types); $i++) {
               echo "<option value='{$types[$i]}'>{$types[$i]}</option>";
            }

            ?>

         </select>
      </div>
   </div>
   <div class="form__Container">
      <label for="hour" class="form__Label">Hour/s:</label>
      <div class="form__Input">
         <select name="hour" id="hour">
            <option value='1'>1 hour</option>
            <option value='1.5'>1.5 hours</option>
            <option value='2'>2 hours</option>
            <option value='2.5'>2.5 hours</option>
            <option value='3'>3 hours</option>
            <option value='3.5'>3.5 hours</option>
            <option value='4'>4 hours</option>
            <option value='4.5'>4.5 hours</option>
            <option value='5'>5 hours</option>
         </select>
      </div>
   </div>
   <button class='form__Button button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="subjects.php?page=<?php echo $page ?>" class='module__formBackground'></a>