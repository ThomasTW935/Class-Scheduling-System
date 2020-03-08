<?php

include 'autoloader.inc.php';

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
  exit();
}

$roomsView = new RoomsView();
$roomsContr = new RoomsContr();
$roomsVal = new RoomsVal($_POST);

var_dump($_POST);
