<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
$schedID = '';
$schedIDExist = isset($_GET['schedid']) && !empty($_GET['schedid']);

$errorProf = $errors['errorProf'] ?? "";
$errorRoom = $errors['errorRoom'] ?? "";
$errorSect = $errors['errorSect'] ?? "";
$errorSubj = $errors['errorSubj'] ?? "";
$errorTime = $errors['errorTime'] ?? "";

$subjID = $errors['inputSubj'] ?? '';
$profID = $errors['inputProf'] ?? '';

if ($schedIDExist) {
  $schedID = $_GET['schedid'];
  $result = $schedView->FetchScheduleByID($schedID)[0];
  $schedDays = $schedView->FetchDayBySchedID($schedID);
  $subjID = $result['subj_id'];
  $profID = $result['prof_id'];
  $button = "update";
  $deleteButton = "<button class='form__Button btn__Secondary' type='submit' name='delete'>delete</button>";
}
?>

<form action='./includes/schedules.inc.php' class='module__Form' method='POST' onsubmit='return validateForm()' draggable="true" id='scheduleForm'>
  <input type="hidden" name="type" value='<?php echo $type ?>'>
  <input type="hidden" name="id" value='<?php echo $ID ?>'>
  <input type="hidden" name="schedID" value='<?php echo $schedID ?>'>
  <input type="hidden" name="schoolYearID" value='<?php echo $schoolYearID ?>'>
  <section class="form__Title">
    <label>Schedules's Information</label>
    <a href='<?php echo "?type=$type&id=$ID" ?>' class='form__Toggle'>X</a>
  </section>
  <div class="form__TimeContainer">
    <div class="form__Input">
      <label for='timeFrom' class='form__Label'>From:</label>
      <select id='timeFrom' name="timeFrom" class='start-time'>
        <?php

        $selected = strtotime($result['sched_from']) ?? "";
        $schedView->GenerateTimeOptions($startTime, $endTime - (60 * 60 * 2), $selected, $jump = $jumpTime)

        ?>

      </select>
    </div>
    <div class="form__Input">
      <label for='timeTo' class='form__Label'>To:</label>
      <select id='timeTo' name="timeTo" class='end-time' disabled>
        <?php

        $selected = strtotime($result['sched_to']) ?? "";
        $schedView->GenerateTimeOptions($startTime + (60 * 90), $endTime, $selected, $jump = $jumpTime, true)

        ?>
      </select>
    </div>
  </div>
  <div class='form__Error'><?php echo $errorTime ?></div>
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
  <div class='form__Error' id='errorDay'></div>

  <?php

  echo "<div class='form__Container'>
    <label for=''>Select Subject</label>
    <div class='form__Input'>
    <select name='inputSubj' onchange='onSubjectChange()' id='subjectsList'>";

  if ($type == 'sect') {
    $subjs = $checklistView->FetchCheclistSubjectsByChkID($sect['chk_id'], $sect['level_id'], $sect['sect_id']);
  } else {
    $subjs = $subjView->FetchSubjectsByDeptID($prof['dept_id']);
  }
  foreach ($subjs as $subj) {
    $selOpt = ($subjID == $subj['subj_id']) ? 'selected' : '';
    echo "<option value='{$subj['subj_id']}' data-hours='{$subj['hours']}' $selOpt>{$subj['subj_desc']} | {$subj['subj_code']}</option>";
  }

  echo "</select>
  <div class='form__Error'>$errorSubj</div>
  </div>
</div>";


  if ($type != 'room') {
    if (!empty($result) && !empty($result['room_id'])) {
      $selRoom = $roomView->FetchRoomByID($result['room_id'])[0];
      $capacity = "Capacity: {$selRoom['rm_capacity']}";
      $optionData = $schedView->GenerateOptionDataValue($selRoom['rm_id'], [$selRoom['rm_name'], $selRoom['rm_desc'], $selRoom['rm_floor'], $capacity]);
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
      <div class='form__Error'>$errorRoom</div>
      </div>
    </div>";
  } else {
    echo "<input type='hidden' name='inputRoom' value='" . $ID . "'>";
  }

  $subjID = (empty($subjID)) ? $subjs[0]['subj_id'] : $subjID;

  if ($type != 'prof') {


    echo "<div class='form__Container'>
      <label for=''>Select Instructor</label>
      <div class='form__Input'>";

    echo "<select name='inputProf' id='professorsList'>";
    $profs = $profView->FetchProfessorsBySubj($schoolYearID, $subjID);
    foreach ($profs as $prof) {
      $selOpt = ($profID == $prof['id']) ? 'selected' : '';
      echo "<option value='{$prof['id']}' $selOpt> {$prof['dept_name']} | {$prof['full_name']}</option>";
    }
    echo "</select>";

    echo "</div>
    </div>";
  } else {
    echo "<input type='hidden' name='inputProf' value='" . $ID . "'>";
  }
  if ($type != 'sect') {
    echo "<div class='form__Container'>
      <label for=''>Select Section</label>
      <div class='form__Input'>
        <select name='inputSect' id='sectionsList'>";

    $sects = $sectView->FetchSectionsBySubj($schoolYearID, $subjID);
    foreach ($sects as $sect) {
      echo "<option value='{$sect['sect_id']}'>{$sect['sect_name']}</option>";
    }

    echo "</select>
      </div>
    </div>";
  } else {
    echo "<input type='hidden' name='inputSect' value='" . $ID . "'>";
  }

  echo "<div class='btn__Container'>";
  echo "<button id='schedulesButton' class='form__Button button' type='submit'    name='$button'>$button</button>";
  echo $deleteButton ?? "";
  echo "</div>";

  ?>

</form>
<a href='<?php echo "?type=$type&id=$ID" ?>' class='module__formBackground form__Toggle'></a>