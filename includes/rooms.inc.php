<?php

include 'autoloader.inc.php';

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
  exit();
}

$roomsView = new RoomsView();
$roomsContr = new RoomsContr();
$roomsVal = new RoomsVal($_POST);

if (!isset($_POST['submitStatus'])) {
  $errors = $roomsVal->validateForm();

  if (!empty($errors)) {
    include_once './functions.inc.php';
    $query = BuildQuery($errors, $_POST);
    $destination = (isset($_POST['submit'])) ? 'add' : "id={$_POST['rmID']}";
    header("Location: ../rooms.php?$destination" . $query);
    exit();
  }
}
if (isset($_POST['submit'])) {
  if (!empty($errors)) {
    header('Location: ../rooms.php?add' . $query);
    exit();
  }
  var_dump($_POST);
  $roomsContr->CreateRoom($_POST);
  $room = $roomsView->FetchRoomByLatest();
  $rmID = $room[0]["rm_id"];
  $schedContr = new SchedulesContr();
  $schedContr->CreateDisplayTime("room", $rmID);
} else if (isset($_POST['update'])) {
  $roomsContr->ModifyRoom($_POST);
} else if (isset($_POST['submitStatus'])) {
  $status = ($_POST['state'] == 0) ? 1 : 0;
  $roomsContr->ModifyRoomState($status, $_POST['rmID']);
  $destination = ($_POST['state'] == 0) ? '?archive' : '';
}
header('Location: ../rooms.php' . $destination);
