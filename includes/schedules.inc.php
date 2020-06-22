<?php

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
  exit();
}

include 'autoloader.inc.php';

var_dump($_POST['days']);
$schedView = new SchedulesView();
$schedContr = new SchedulesContr();
$schedVal = new SchedulesVal($_POST);

//$errors = $schedVal->validateForm($_POST);
echo '<br>';

if (isset($_POST['scheduleSave'])) {
  var_dump($_POST);
  $schedContr->ModifyDisplayTime($_POST);
}
if(isset($_POST['submit'])){
  $days = $_POST['days'];
  foreach($days as $day){
    $_POST['days'] = $day;
    $schedContr->CreateSchedule($_POST);
  }
}

header("Location: ../schedules.php?type={$_POST['type']}&id=" . $_POST['id']);
