<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
if (isset($_GET['schedID']) && !empty($_GET['schedID'])) {
  $id = $_GET['schedID'];
  $profView = new ProfessorsView();
  $result = $profView->FetchProfessorByID($id);
  $prof = $result[0];
  $button = "update";
}

$fromTime = $_GET['from'] ?? '07:00';
$toTime = $_GET['to'] ?? '17:00';

$returnID = $_GET['id'];

?>

<form action='./includes/schedules.inc.php' class='module__Form' method='POST'>
  <a href="schedules.php?load=<?php echo $load . '&id=' . $returnID ?>" class='form__Close'>X</a>
  <label class='form__Title'>Schedules's Information</label>
  <div class="form__TimeContainer">
    <div class="form__Input">
      <label for='timeFrom' class='form__Label'>From:</label>
      <input type="time" name="timeFrom" id="timeFrom">
    </div>
    <div class="form__Input">
      <label for='timeTo' class='form__Label'>To:</label>
      <input type="time" name="timeTo" id="timeTo">
    </div>
  </div>
  <div class="form__DayContainer">

    <input type="checkbox" name="day" id="monday">
    <label for="monday">m</label>
    <input type="checkbox" name="day" id="tuesday">
    <label for="tuesday">t</label>
    <input type="checkbox" name="day" id="wednesday">
    <label for="wednesday">w</label>
    <input type="checkbox" name="day" id="thursday">
    <label for="thursday">th</label>
    <input type="checkbox" name="day" id="friday">
    <label for="friday">f</label>
    <input type="checkbox" name="day" id="saturday">
    <label for="saturday">s</label>

  </div>
  <?php

  if ($load != 'prof') {
    echo "<div class='form__Container'>
      <label for=''>Select Professor</label>
      <div class='form__Input'>
        <input list='profList'>
        <datalist id='profList'>";

    $profs = $profView->FetchProfessorsByState(1);
    $profView->DisplayProfessorsInSearch($profs);

    echo "</datalist>
      </div>
    </div>";
  }
  ?>
  <?php

  if ($load != 'subj') {
    echo "<div class='form__Container'>
    <label for=''>Select Subject</label>
    <div class='form__Input'>
      <input list='subjList'>
      <datalist id='subjList'>";

    $subjs = $subjView->FetchSubjectsByState(1);
    $subjView->DisplaySubjectsInSearch($subjs);

    echo "</datalist>
    </div>
  </div>";
  }
  ?>
  <?php

  if ($load != 'room') {
    echo "<div class='form__Container'>
      <label for=''>Select Room</label>
      <div class='form__Input'>
        <input list='roomList'>
        <datalist id='roomList'>";

    $rooms = $roomView->FetchRoomsByState(1);
    $roomView->DisplayRoomsInSearch($rooms);

    echo "</datalist>
      </div>
    </div>";
  }

  ?>
  <?php
  if ($load != 'sect') {
    echo "<div class='form__Container'>
      <label for=''>Select Section</label>
      <div class='form__Input'>
        <input list='sectList'>
        <datalist id='sectList'>";

    $sects = $sectView->FetchSectionsByState(1);
    $sectView->DisplaySectionsInSearch($sects);

    echo "</datalist>
      </div>
    </div>";
  }
  ?>

  <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="schedules.php?load=<?php echo $load . '&id=' . $returnID ?>" class='module__formBackground'></a>