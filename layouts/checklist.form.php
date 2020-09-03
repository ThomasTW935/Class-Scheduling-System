<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
parse_str($query, $errors);
$errorName = $errors['errorName'] ?? '';


$buttonName = 'add';
$id = '';
$name = '';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $checklist = $checklistView->FetchCheckListByID($id)[0];
  $name = $checklist['name'];
  $buttonName = 'update';
}
?>

<form action='./includes/checklist.inc.php' class='module__Form' method='POST'>
  <section class="form__Title">
    <label>Checklist Information</label>
    <a href="?deptid=<?php echo $deptID ?>&page=1">X</a>
  </section>
  <input type="hidden" name="deptID" value='<?php echo $deptID ?>'>
  <input type="hidden" name="id" value='<?php echo $id ?>'>
  <div class="form__Container">
    <label for='' class='form__Label'>Checklist Name:</label>
    <div class="form__Input">
      <input type="text" name="name" value='<?php echo $name ?>'>
    </div>
  </div>

  <?php

  echo "<button class='form__Button button' type='submit' name='$buttonName-checklist'>$buttonName Checklist</button>";

  ?>

</form>
<a href="?deptid=<?php echo $deptID ?>&page=1" class='module__formBackground'></a>