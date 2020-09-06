<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);

$errorName = $errors['errorName'] ?? '';

$sectID  = '';
$name    = '';
$year    = $errors['year'] ?? '';
$deptID  = $errors['deptID'] ?? '';
$levelID  = $errors['levelID'] ?? '';
$chkID  = $errors['chkID'] ?? '';
if (isset($_GET['id'])) {
  $id      = $_GET['id'];
  $result  = $sectView->FetchSectionByID($id);
  $sect    = $result[0];
  $button  = "update";
  $sectID  = $sect['sect_id'];
  $name    = $sect['sect_name'];
  $year    = $sect['sect_year'];
  $deptID  = $sect['dept_id'];
  $levelID = $sect['level_id'];
  $chkID = $sect['chk_id'];
}

?>

<form action='./includes/sections.inc.php' class='module__Form' method='POST'>
  <section class="form__Title">
    <label>Section's Information</label>
    <a href='settings.php?page=<?php echo $page ?>'>X</a>
  </section>
  <input class='form__Input' type='hidden' value='<?php echo $page ?>' name='page'>
  <input class='form__Input' type='hidden' value='<?php echo $sectID ?>' name='sectID'>
  <div class='form__Container'>
    <label for='' class='form__Label'>School Year:</label>
    <div class='form__Input'>
      <input type="date" name="" id="">
      <div class='form__Error'><?php echo $errorName ?></div>
    </div>
  </div>

  <button class='form__Button button' type='submit' name='<?php echo $button ?>'> <?php echo $button ?> </button>

</form>
<a href="settings.php?page=<?php echo $page ?>" class='module__formBackground'></a>