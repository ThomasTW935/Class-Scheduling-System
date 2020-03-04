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
  $query = '&' . http_build_query($errors);
}
if (isset($_POST['submit'])) {
  if (!empty($errors)) {
    header('Location: ../rooms.php?add' . $query);
    exit();
  }
  $roomsContr->CreateRoom($_POST);
} else if (isset($_POST['update'])) {
  if (!empty($errors)) {
    header('Location: ../rooms.php?id=' . $_POST['id'] . $query);
    exit();
  }
  $roomsContr->ModifyRoom($_POST);
} else if (isset($_POST['submitStatus'])) {
  $status = ($_POST['status'] == 0) ? 1 : 0;
  $roomsContr->ModifyRoomState($status, $_POST['id']);
}
header('Location: ../rooms.php');
