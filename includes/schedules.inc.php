<?php

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
  exit();
}

include 'autoloader.inc.php';

$schedView = new SchedulesView();
$schedContr = new SchedulesContr();
$schedVal = new SchedulesVal($_POST);

//$errors = $schedVal->validateForm($_POST);
echo '<br>';

if (isset($_POST['scheduleSave'])) {
  var_dump($_POST);
  $schedContr->ModifyDisplayTime($_POST);
}
header("Location: ../schedules.php?type={$_POST['type']}&id=" . $_POST['id']);
