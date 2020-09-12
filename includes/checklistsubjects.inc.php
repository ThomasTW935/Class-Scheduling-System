<?php

if (!isset($_POST)) {
  header("Location: ../index.php");
  exit();
}

include 'autoloader.inc.php';

$checklistContr = new ChecklistContr();

if (!isset($_POST['delete-subject'])) {
  $checklistVal = new ChecklistVal($_POST);
  $errors = $checklistVal->validateForm();
  var_dump($errors);
  if (!empty($errors)) {
    $func = new Functions();
    $query = $func->BuildQuery($errors, $_POST);
    $isUpdate = (isset($_POST['add-subject'])) ? '&add' : "&stcid={$_POST['stcID']}";
    header("Location: ../checklistsubjects.php?id={$_POST['chkID']}$isUpdate" . $query);
    exit();
  }
}

if (isset($_POST['add-subject'])) {
  $checklistContr->CreateChecklistSubject($_POST);
}
if (isset($_POST['update-subject'])) {
  $checklistContr->ModifyChecklistSubject($_POST);
}
if (isset($_POST['delete-subject'])) {
  $checklistContr->RemoveChecklistSubject($_POST['stcID']);
}
header("Location: ../checklistsubjects.php?id={$_POST['chkID']}");
