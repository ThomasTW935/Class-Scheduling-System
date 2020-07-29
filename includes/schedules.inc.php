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

header("Location: ../schedules.php?type={$_POST['type']}&id=" . $_POST['id']);
