<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
$schedID = '';
$schedIDExist = isset($_GET['schedid']) && !empty($_GET['schedid']);
if ($schedIDExist) {
  $schedID = $_GET['schedid'];
  $result = $schedView->FetchScheduleByID($schedID)[0];
  $schedDays = $schedView->FetchDayBySchedID($schedID);
  $button = "update";
  $deleteButton = "<button class='form__Button btn__Delete' type='submit' name='delete'>delete</button>";
}

?>

<form action='./includes/schedules.inc.php' class='module__Form' method='POST'>
  <section class="form__Close">
    <a href='<?php echo "?type=$type&id=$ID" ?>' class='form__Toggle'>X</a>
  </section>
  <label class='form__Title'>Schedules's Information</label>
  <input type="hidden" name="type" value='<?php echo $type ?>'>
  <input type="hidden" name="id" value='<?php echo $ID ?>'>
  <input type="hidden" name="schedID" value='<?php echo $schedID ?>'>
  <div class="form__TimeContainer">
    <div class="form__Input">
      <label for='timeFrom' class='form__Label'>From:</label>
      <select name="timeFrom">
        <?php

        $selected = strtotime($result['sched_from']) ?? "";
        $schedView->GenerateTimeOptions($newStartTime, $newEndTime - (60 * 60), $selected, $jump = $jumpTime)

        ?>

      </select>
    </div>
    <div class="form__Input">
      <label for='timeTo' class='form__Label'>To:</label>
      <select name="timeTo" class='select__To'>
        <?php

        $selected = strtotime($result['sched_to']) ?? "";

        $schedView->GenerateTimeOptions($newStartTime + (60 * 60), $newEndTime, $selected, $jump = $jumpTime, true)

        ?>
      </select>
    </div>
  </div>
  <div class="form__DayContainer">

    <?php
    $days = array(
      'm' => 'Monday',
      't' => 'Tuesday',
      'w' => 'Wednesday',
      'th' => 'Thursday',
      'f' => 'Friday',
      's' => 'Saturday'
    );
    foreach ($days as $key => $value) {
      $checked = '';
      if (!empty($schedDays)) {
        foreach ($schedDays as $schedDay) {
          if ($schedDay['sched_day'] === $value) {
            $checked = true;
          }
        }
      }
      $schedView->GenerateDayChoices($key, $value, $checked);
    }

    ?>
  </div>
  <?php
  $optionValue = '';
  $optionID = '';
  if ($type != 'prof') {
    if (!empty($result) && !empty($result['prof_id'])) {
      $selProf = $profView->FetchProfessorByID($result['prof_id'])[0];
      $fullName = $profView->GenerateFullName($selProf['last_name'], $selProf['first_name'], $selProf['middle_initial'], $selProf['suffix']);
      $optionData = $schedView->GenerateOptionDataValue($selProf['id'], [$fullName, $selProf['dept_name']]);
      $optionValue = $optionData['value'];
      $optionID = $optionData['id'];
    }
    if (empty($result['prof_id'])) {
      $optionValue = '';
      $optionID = '';
    }

    echo "<div class='form__Container'>
      <label for=''>Select Professor</label>
      <div class='form__Input'>
        <input class='input__Prof search__Input' list='profList' value='$optionValue'>
        <input class='input__Prof--Hidden' name='inputProf' type='hidden' value='$optionID'>
        <datalist class='input__Prof--List' id='profList'>";

    $profs = $profView->FetchProfessorsByState(1);
    $profView->DisplayProfessorsInSearch($profs);

    echo "</datalist>
      </div>
    </div>";
  } else {
    echo "<input type='hidden' name='inputProf' value='" . $ID . "'>";
  }
  ?>
  <?php

  if ($type != 'subj') {
    if (!empty($result) && !empty($result['subj_id'])) {
      $selSubj = $subjView->FetchSubjectByID($result['subj_id'])[0];
      $unit = $selSubj['units'] . " Unit/s";
      $optionData = $schedView->GenerateOptionDataValue($selSubj['subj_id'], [$selSubj['subj_code'], $selSubj['subj_desc'], $unit]);
      $optionValue = $optionData['value'];
      $optionID = $optionData['id'];
    }
    if (empty($result['subj_id'])) {
      $optionValue = '';
      $optionID = '';
    }
    echo "<div class='form__Container'>
    <label for=''>Select Subject</label>
    <div class='form__Input'>
      <input class='input__Subject search__Input' list='subjList' value='$optionValue'>
      <input class='input__Subject--Hidden' name='inputSubj' type='hidden' value='$optionID'>
      <datalist class='input__Subject--List' id='subjList'>";

    $subjs = $subjView->FetchSubjectsByState(1);
    $subjView->DisplaySubjectsInSearch($subjs);

    echo "</datalist>
    </div>
  </div>";
  } else {
    echo "<input type='hidden' name='inputSubj' value='" . $ID . "'>";
  }
  ?>
  <?php

  if ($type != 'room') {
    if (!empty($result) && !empty($result['room_id'])) {
      $selSect = $roomView->FetchRoomByID($result['room_id'])[0];
      $floor = $roomView->FloorConvert($selSect['rm_floor']) . ' floor';
      $name = "Rm {$selSect['rm_name']}";
      $optionData = $schedView->GenerateOptionDataValue($selSect['rm_id'], [$name, $selSect['rm_desc'], $floor]);
      $optionValue = $optionData['value'];
      $optionID = $optionData['id'];
    }
    if (empty($result['room_id'])) {
      $optionValue = '';
      $optionID = '';
    }
    echo "<div class='form__Container'>
      <label for=''>Select Room</label>
      <div class='form__Input'>
        <input class='input__Room search__Input' list='roomList' value='$optionValue' >
        <input class='input__Room--Hidden' name='inputRoom' type='hidden' value='$optionID' >
        <datalist class='input__Room--List' id='roomList'>";

    $rooms = $roomView->FetchRoomsByState(1);
    $roomView->DisplayRoomsInSearch($rooms);

    echo "</datalist>
      </div>
    </div>";
  } else {
    echo "<input type='hidden' name='inputRoom' value='" . $ID . "'>";
  }

  ?>
  <?php
  if ($type != 'sect') {
    if (!empty($result) && !empty($result['sect_id'])) {
      $selSect = $sectView->FetchSectionByID($result['sect_id'])[0];
      $optionData = $schedView->GenerateOptionDataValue($selSect['sect_id'], [$selSect['sect_name']]);
      $optionValue = $optionData['value'];
      $optionID = $optionData['id'];
    }
    if (empty($result['sect_id'])) {
      $optionValue = '';
      $optionID = '';
    }
    echo "<div class='form__Container'>
      <label for=''>Select Section</label>
      <div class='form__Input'>
        <input class='input__Sect search__Input' list='sectList'  value='$optionValue'>
        <input class='input__Sect--Hidden' name='inputSect' type='hidden' value='$optionID'>
        <datalist class='input__Sect--List' id='sectList'>";

    $sects = $sectView->FetchSectionsByState(1);
    $sectView->DisplaySectionsInSearch($sects);

    echo "</datalist>
      </div>
    </div>";
  } else {
    echo "<input type='hidden' name='inputSect' value='" . $ID . "'>";
  }

  echo "<div class='btn__Container'>";
  echo "<button class='form__Button button' type='submit'  name='$button'>$button</button>";
  echo $deleteButton ?? "";
  echo "</div>";

  ?>

</form>
<a href='<?php echo "?type=$type&id=$ID" ?>' class='module__formBackground form__Toggle'></a>