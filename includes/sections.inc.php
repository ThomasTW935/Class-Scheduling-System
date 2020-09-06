<?php

if (!isset($_POST)) {
  header('Location: ../dashboard.php');
  exit();
}

include 'autoloader.inc.php';

$sectView = new SectionsView();
$sectContr = new SectionsContr();
$sectVal = new SectionsVal($_POST);
$page = $_POST['page'];
$destination = "page=$page";
if (!isset($_POST['submitStatus'])) {
  $errors = $sectVal->validateForm();
  if (!empty($errors)) {
    $func = new Functions();
    $query = $func->BuildQuery($errors, $_POST);
    $destination .= (isset($_POST['submit'])) ? '&add' : "&id={$_POST['sectID']}";
    header("Location: ../sections.php?$destination" . $query);
    exit();
  }
}

if (isset($_POST['submit'])) {
  $sectContr->CreateSection($_POST);
  $sect = $sectView->FetchSectionByLatest();
  $sectID = $sect[0]["sect_id"];
  $schedContr = new SchedulesContr();
  $schedContr->CreateDisplayTime("sect", $sectID);
} else if (isset($_POST['update'])) {
  $sectContr->ModifySection($_POST);
} else if (isset($_POST['submitStatus'])) {
  $state = ($_POST['state'] == 0) ? 1 : 0;
  $sectContr->ModifySectionState($state, $_POST['schooYearID'], $_POST['sectID']);
  $isArchived = ($_POST['state'] == 0) ? 'archive&' : '';
  $destination = $isArchived . $destination;
}
header('Location: ../sections.php?' . $destination);
