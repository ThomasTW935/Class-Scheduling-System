<?php

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
  exit();
}

include 'autoloader.inc.php';

$schedView = new SchedulesView();
$schedContr = new SchedulesContr();
$schedVal = new SchedulesVal($_POST);
$returnURL = "?type={$_POST['type']}&id={$_POST['id']}";


if (isset($_POST['scheduleSave'])) {
  $schedContr->ModifyDisplayTime($_POST);
}


if (isset($_POST['submit']) || isset($_POST['update'])) {
  $schedID = $_POST['schedID'];
  $errors = $schedVal->validateForm($_POST);
  echo "<br>";
  echo "<br>";
  echo "Error: ";
  var_dump($errors);
  if (!empty($errors)) {
    $query = '&' . http_build_query($errors);
    if (isset($_POST['update'])) {
      $returnURL .= "&schedid=$schedID";
    } else {
      $returnURL .= "&action";
    }
    $returnURL .= $query;
    header("Location: ../schedules.php$returnURL");
    exit();
  }
}

if (isset($_POST['submit'])) {
  $schedContr->CreateSchedule($_POST);
  $schedID = $schedView->FetchScheduleByIDDesc()[0]['sched_id'];
  $days = $_POST['days'];
  foreach ($days as $day) {
    $schedContr->CreateDay($schedID, $day);
  }
}
if (isset($_POST['update'])) {

  //Updating Schedule

  var_dump($_POST);
  $schedContr->ModifySchedule($_POST);

  // Updating Days

  $newDays = $_POST['days'];
  $FetchDays = $schedView->FetchDayBySchedID($schedID);
  $existDays = array();
  foreach ($FetchDays as $value) {
    $existDays[$value['id']] = $value['sched_day'];
  }
  $mergeDays = array_unique(array_merge($newDays, $existDays));
  $actualDays = array_diff($mergeDays, $existDays);
  $removedDays = array_diff($existDays, $newDays);
  foreach ($actualDays as $actualDay) {
    $schedContr->CreateDay($schedID, $actualDay);
  }
  foreach ($removedDays as $key => $value) {
    $schedContr->RemoveDay($key);
  }
}

if (isset($_POST['delete'])) {

  $schedContr->RemoveSchedule($_POST['schedID']);
  var_dump($_POST);
}
header("Location: ../schedules.php$returnURL");
