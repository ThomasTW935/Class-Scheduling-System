<?php

if (!isset($_POST)) {
  header("Location: ../index.php");
  exit();
}

include 'autoloader.inc.php';

$checklistContr = new ChecklistContr();

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
