<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);

$errorName = $errors['errorName'] ?? '';

$name    = '';
$year    = $errors['year'] ?? '';
$id = '';

if (isset($_GET['id'])) {
  $id      = $_GET['id'];
  $result  = $schoolyearView->FetchSchoolYearByID($id)[0];
  $year = $result['year'];
  $button = 'update';
}

$opStart = (isset($_GET['id'])) ? strtotime($result['operation_start']) : "";
$opEnd = (isset($_GET['id'])) ? strtotime($result['operation_end']) : "";

?>

<form action='./includes/settings.inc.php' class='module__Form' method='POST'>
  <section class="form__Title">
    <label>Section's Information</label>
    <a href='settings.php?page=<?php echo $page ?>'>X</a>
  </section>
  <input class='form__Input' type='hidden' value='<?php echo $page ?>' name='page'>
  <input class='form__Input' type='hidden' value='<?php echo $id ?>' name='id'>
  <div class='form__Container'>
    <label for='' class='form__Label'>School Year:</label>
    <div class='form__Input'>
      <input type="text" name="year" id="" value='<?php echo $year ?>'>
      <div class='form__Error'><?php echo $errorName ?></div>
    </div>
  </div>
  <div class='form__Container'>
    <label for='' class='form__Label'>Start:</label>
    <div class='form__Input'>
      <select name='opStart'>
        <?php

        $startFrom = strtotime('5:00');
        $startTo = strtotime('12:00');
        for ($i = $startFrom; $i < $startTo; $i += 60 * 60) {
          $optSelect = ($i == $opStart) ? 'selected' : '';
          echo "<option value='" . date('G:i', $i) . "' $optSelect>" . date('g:i A', $i) . "</option>";
        }

        ?>
      </select>
    </div>
  </div>
  <div class='form__Container'>
    <label for='' class='form__Label'>End:</label>
    <div class='form__Input'>
      <select name='opEnd'>
        <?php

        $endFrom = strtotime('16:00');
        $endTo = strtotime('22:00');
        for ($i = $endFrom; $i <= $endTo; $i += 60 * 60) {
          $optSelect = ($i == $opEnd) ? 'selected' : '';
          echo "<option value='" . date('G:i', $i) . "' $optSelect>" . date('g:i A', $i) . "</option>";
        }

        ?>
      </select>
    </div>
  </div>

  <button class='form__Button button' type='submit' name='<?php echo $button ?>'> <?php echo $button ?> </button>

</form>
<a href="settings.php?page=<?php echo $page ?>" class='module__formBackground'></a>