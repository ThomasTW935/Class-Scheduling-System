<?php

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
  exit();
}

include 'autoloader.inc.php';

$schedView = new SchedulesView();
$schedContr = new SchedulesContr();
$schedVal = new SchedulesVal($_POST);

var_dump($_POST);
$fromTime = $_POST['fromTime'];
$toTime = $_POST['toTime'];
$viewBy = $_POST['viewBy'];
header("Location: ../schedules.php?from=$fromTime&to=$toTime&view=$viewBy");
