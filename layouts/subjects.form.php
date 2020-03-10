<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $result = $subjView->FetchSubjectByID($id);
   $subj = $result[0];
   $button = "update";
}
?>

<form action='./includes/subjects.inc.php' class='module__Form' method='POST'>
   <a href="subjects.php" class='form__Close'>X</a>
   <label for='formSelect' class='form__Title'>Subject's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $subj['subj_id'] ?? '' ?>' name='subjID'>
   <div class="form__Container">
      <label for='' class='form__Label'>Code:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $subj['subj_code'] ?? '' ?>' name='code' required>
         <div class="form__Error"><?php echo $errors['subjectCode'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Description:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $subj['subj_desc'] ?? '' ?>' name='desc' required>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Unit/s:</label>
      <div class="form__Input">
         <input class='form__Input' type='number' value='<?php echo $subj['units'] ?? '' ?>' name='units' required>
         <div class="form__Error"><?php echo $errors['units'] ?? '' ?></div>
      </div>
   </div>
   <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="subjects.php" class='module__formBackground'></a>