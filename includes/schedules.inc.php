<?php

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
  exit();
}

include 'autoloader.inc.php';

$schedView = new SchedulesView();
$schedContr = new SchedulesContr();
$schedVal = new SchedulesVal($_POST);

// $errors = $schedVal->validateForm($_POST);
if (isset($_POST['scheduleSave'])) {
  $schedContr->ModifyDisplayTime($_POST);
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

  $schedID = $_POST['schedID'];
  $newDays = $_POST['days'];
  $FetchDays = $schedView->FetchDayBySchedID($schedID);
  $existDays = array();
  foreach ($FetchDays as $value) {
    $existDays[$value['id']] = $value['sched_day'];
  }
  $mergeDays = array_unique(array_merge($newDays, $existDays));
  $actualDays = array_intersect($newDays, $mergeDays);
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
header("Location: ../schedules.php?type={$_POST['type']}&id=" . $_POST['id']);
