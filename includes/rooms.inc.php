<?php

include 'autoloader.inc.php';

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
  exit();
}

$roomsView = new RoomsView();
$roomsContr = new RoomsContr();
$roomsVal = new RoomsVal($_POST);
$page = $_POST['page'];
$destination = "page=$page";

if (!isset($_POST['submitStatus'])) {
  $errors = $roomsVal->validateForm();

  if (!empty($errors)) {
    $func = new Functions();
    $query = $func->BuildQuery($errors, $_POST);
    $destination .= (isset($_POST['submit'])) ? '&add' : "&id={$_POST['rmID']}";
    header("Location: ../rooms.php?$destination" . $query);
    exit();
  }
}
if (isset($_POST['submit'])) {
  $roomsContr->CreateRoom($_POST);
} else if (isset($_POST['update'])) {
  $roomsContr->ModifyRoom($_POST);
} else if (isset($_POST['submitStatus'])) {
  $status = ($_POST['state'] == 0) ? 1 : 0;
  $roomsContr->ModifyRoomState($status, $_POST['rmID']);
  $isArchived = ($_POST['state'] == 0) ? 'archive&' : '';
  $destination = $isArchived . $destination;
}
header('Location: ../rooms.php?' . $destination);
