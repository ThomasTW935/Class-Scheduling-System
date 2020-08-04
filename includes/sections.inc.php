<?php

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
  exit();
}

include 'autoloader.inc.php';

$sectView = new SectionsView();
$sectContr = new SectionsContr();
$sectVal = new SectionsVal($_POST);

if (!isset($_POST['submitStatus'])) {
  $errors = $sectVal->validateForm();
  if (!empty($errors)) {
    include_once './functions.inc.php';
    $query = BuildQuery($errors, $_POST);
    $destination = (isset($_POST['submit'])) ? 'add' : "id={$_POST['sectID']}";
    header("Location: ../sections.php?$destination" . $query);
    exit();
  }
}

if (isset($_POST['submit'])) {
  $sectContr->CreateSection($_POST);
  $sect = $roomsView->FetchRoomByLatest();
  $sectID = $sect[0]["sect_id"];
  $schedContr = new SchedulesContr();
  $schedContr->CreateDisplayTime("sect", $sectID);
} else if (isset($_POST['update'])) {
  $sectContr->ModifySection($_POST);
} else if (isset($_POST['submitStatus'])) {
  $state = ($_POST['state'] == 0) ? 1 : 0;
  $sectContr->ModifySectionState($_POST['sectID'], $state);
  $destination = ($_POST['state'] == 0) ? '?archive' : '';
}
header('Location: ../sections.php' . $destination);
