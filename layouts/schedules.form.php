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

$isProgHead = $_SESSION['type'] == 'Program Head';
$isDisabled = ($isProgHead || $type == 'room') ? 'disabled' : '';

if ($schedIDExist) {
  $schedID = $_GET['schedid'];
  $result = $schedView->FetchScheduleByID($schedID)[0];
  $schedDays = $schedView->FetchDayBySchedID($schedID);
  $subjID = $result['subj_id'];
  $profID = $result['prof_id'];
  $roomID = $result['room_id'];
  $sectID = $result['sect_id'];
  $button = "update";
  if (!$isProgHead) {
    $deleteButton = "<button class='form__Button btn__Secondary' type='submit' name='delete'>delete</button>";
  }
}
$selectedFrom = ($schedIDExist) ? strtotime($result['sched_from']) : "";
$selectedTo = ($schedIDExist) ? strtotime($result['sched_to']) : "";




?>

<form action='./includes/schedules.inc.php' class='module__Form' method='POST' onsubmit='return validateForm()' draggable="true" id='scheduleForm'>
  <input type="hidden" name="type" value='<?php echo $type ?>'>
  <input type="hidden" name="id" value='<?php echo $ID ?>'>
  <input type="hidden" name="schedID" value='<?php echo $schedID ?>'>
  <input type="hidden" name="schoolYearID" value='<?php echo $schoolYearID ?>'>

  <?php

  if ($isProgHead || $type == 'room') {
    $selectedFromNew = date('G:i', $selectedFrom);
    $selectedToNew = date('G:i', $selectedTo);
    echo "<input type='hidden' name='timeFrom' value='$selectedFromNew'>";
    echo "<input type='hidden' name='timeTo' value='$selectedToNew'>";
    echo "<input type='hidden' name='inputSubj' value='$subjID'>";
    echo "<input type='hidden' name='inputRoom' value='$roomID'>";
    echo "<input type='hidden' name='inputSect' value='$sectID'>";
    foreach ($schedDays as $schedDay) {
      echo "<input type='hidden' name='days[]' value='{$schedDay['sched_day']}'>";
    }
  }

  ?>

  <section class="form__Title">
    <label>Schedules's Information</label>
    <a href='<?php echo "?type=$type&id=$ID" ?>' class='form__Toggle'>X</a>
  </section>
  <div class="form__TimeContainer">
    <div class="form__Input">
      <label for='timeFrom' class='form__Label'>From:</label>
      <select id='timeFrom' name="timeFrom" class='start-time' <?php echo  $isDisabled ?>>
        <?php


        $schedView->GenerateTimeOptions($startTime, $endTime - (60 * 90), $selectedFrom, $jump = $jumpTime)

        ?>

      </select>
    </div>
    <div class="form__Input">
      <label for='timeTo' class='form__Label'>To:</label>
      <select id='timeTo' name="timeTo" class='end-time' <?php echo  $isDisabled ?>>
        <?php

        $schedView->GenerateTimeOptions($startTime + (60 * 90), $endTime, $selectedTo, $jump = $jumpTime)

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
      $schedView->GenerateDayChoices($key, $value, $checked, $isDisabled);
    }

    ?>
  </div>
  <div class='form__Error' id='errorDay'></div>

  <?php

  echo "<div class='form__Container'>
    <label for=''>Select Subject</label>
    <div class='form__Input'>
    <select name='inputSubj' onchange='onSubjectChange()' id='subjectsList'  $isDisabled>";

  if ($type == 'sect') {
    $subjs = $checklistView->FetchCheclistSubjectsByChkID($sect['chk_id'], $sect['level_id'], $sect['sect_id']);
  } else if ($type == 'room') {
    $subjs = $subjView->FetchSubjectByID($subjID);
  } else {
    $subjs = $subjView->FetchSubjectsByDeptID($prof['dept_id']);
  }
  foreach ($subjs as $subj) {
    $selOpt = ($subjID == $subj['subj_id']) ? 'selected' : '';
    echo "<option value='{$subj['subj_id']}' data-hours='{$subj['hours']}' $selOpt> {$subj['subj_code']} | {$subj['subj_desc']} | {$subj['hours']} hours </option>";
  }

  echo "</select>
  <div class='form__Error'>$errorSubj</div>
  </div>
</div>";

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
    echo "</select>
      <div class='form__Error'>$errorProf</div>
    </div>
    </div>";
  } else {
    echo "<input type='hidden' name='inputProf' value='" . $ID . "'>";
  }


  echo "<div class='form__Container'>
      <label for=''>Select Room</label>
      <div class='form__Input'>
        <select name='inputRoom' id='roomsList' $isDisabled>";
  $isLab = $subjView->FetchSubjectByID($subjID)[0]['is_laboratory'];
  $rooms = $roomView->FetchRoomsBySubj($isLab);
  echo "<option disabled>asdasdasd</option>";
  foreach ($rooms as $room) {
    echo "<option value='{$room['rm_id']}'>{$room['rm_name']} | {$room['rm_desc']} | {$room['rm_capacity']}</option>";
  }
  echo "</select>
        <div class='form__Error'>$errorRoom</div>
      </div>
  </div>";

  if ($type != 'sect') {
    echo "<div class='form__Container'>
      <label for=''>Select Section</label>
      <div class='form__Input'>
        <select name='inputSect' id='sectionsList' $isDisabled>";

    $sects = $sectView->FetchSectionsBySubj($schoolYearID, $subjID);
    foreach ($sects as $sect) {
      echo "<option value='{$sect['sect_id']}'>{$sect['sect_name']}</option>";
    }

    echo "</select>
          <div class='form__Error'>$errorSect</div>
      </div>
    </div>";
  } else {
    echo "<input type='hidden' name='inputSect' value='" . $ID . "'>";
  }

  echo "<div class='btn__Container'>";
  echo "<button id='schedulesButton' class='form__Button button' type='submit' name='$button'>$button</button>";
  echo $deleteButton ?? "";
  echo "</div>";

  ?>

</form>
<a href='<?php echo "?type=$type&id=$ID" ?>' class='module__formBackground form__Toggle'></a>