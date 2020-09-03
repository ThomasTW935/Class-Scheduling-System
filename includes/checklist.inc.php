<?php

if (!isset($_POST)) {
  header("Location: ../index.php");
  exit();
}

include 'autoloader.inc.php';

$checklistContr = new ChecklistContr();

if (isset($_POST['add-checklist'])) {
  $checklistContr->CreateChecklist($_POST);
}
if (isset($_POST['update-checklist'])) {
  $checklistContr->ModifyChecklist($_POST);
}
if (isset($_POST['submitStatus'])) {
  $state = ($_POST['state'] == 0) ? 1 : 0;
  $checklistContr->ModifyChecklistState($state, $_POST['id']);
}
header("Location: ../checklist.php?deptid={$_POST['deptID']}");
