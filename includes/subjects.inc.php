<?php

if (!isset($_POST)) {
   header('Location: ../dashboard.php');
   exit();
}

include 'autoloader.inc.php';

$subjView = new SubjectsView();
$subjContr = new SubjectsContr();
$subjVal = new SubjectsVal($_POST);
$page = $_POST['page'];
$destination = "page=$page";
if (!isset($_POST['submitStatus'])) {
   $errors = $subjVal->validateForm();
   $query = '&' . http_build_query($errors);
   if (!empty($errors)) {
      $func = new Functions();
      $query = $func->BuildQuery($errors, $_POST);
      $destination .= (isset($_POST['submit'])) ? '&add' : "&id={$_POST['subjID']}";
      header("Location: ../subjects.php?$destination" . $query);
      exit();
   }
}

if (isset($_POST['submit'])) {

   $subjContr->CreateSubject($_POST);
} else if (isset($_POST['update'])) {
   $subjContr->ModifySubject($_POST);
} else if (isset($_POST['submitStatus'])) {
   $state = ($_POST['state'] == 0) ? 1 : 0;
   $subjContr->ModifySubjectState($state, $_POST['subjID']);
   $isArchived = ($_POST['state'] == 0) ? 'archive&' : '';
   $destination = $isArchived . $destination;
}
header('Location: ../subjects.php?' . $destination);
