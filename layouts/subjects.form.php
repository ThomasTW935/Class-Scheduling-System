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
$units = $errors['units'] ?? '';
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
   <section class="form__Close">
      <a href="subjects.php?page=<?php echo $page ?>">X</a>
   </section>
   <label for='formSelect' class='form__Title'>Subject's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $page ?>' name='page'>
   <input class='form__Input' type='hidden' value='<?php echo $subjID ?>' name='subjID'>
   <div class="form__Container">
      <label for='' class='form__Label'>Code:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $code ?>' name='code' required>
         <div class="form__Error">asdasd<?php echo $errorCode ?></div>
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
         <input class='form__Input' type='number' value='<?php echo $units ?>' value='1' min='1' name='units' required>
      </div>
   </div>
   <button class='form__Button button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="subjects.php?page=<?php echo $page ?>" class='module__formBackground'></a>