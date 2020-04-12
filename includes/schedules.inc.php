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
$errors = $schedVal->validateForm($_POST);
echo '<br>';
var_dump($errors);

exit();
