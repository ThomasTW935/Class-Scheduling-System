<?php

if (!isset($_POST)) {
   header('Location: ../dashboard.php');
   exit();
}

include 'autoloader.inc.php';

$subjView = new SubjectsView();
$subjContr = new SubjectsContr();
$subjVal = new SubjectsVal($_POST);

if (!isset($_POST['submitStatus'])) {
   $errors = $subjVal->validateForm();
   $query = '&' . http_build_query($errors);
   if (!empty($errors)) {
      include_once './functions.inc.php';
      $query = BuildQuery($errors, $_POST);
      $destination = (isset($_POST['submit'])) ? 'add' : "id={$_POST['subjID']}";
      header("Location: ../subjects.php?$destination" . $query);
      exit();
   }
}

if (isset($_POST['submit'])) {

   $subjContr->CreateSubject($_POST);
   $subj = $subjView->FetchSubjectByLatest();
   $subjID = $subj[0]["subj_id"];
   $schedContr = new SchedulesContr();
   $schedContr->CreateDisplayTime("subj", $subjID);
} else if (isset($_POST['update'])) {
   $subjContr->ModifySubject($_POST);
} else if (isset($_POST['submitStatus'])) {
   $state = ($_POST['state'] == 0) ? 1 : 0;
   $subjContr->ModifySubjectState($_POST['subjID'], $state);
   $destination = ($_POST['state'] == 0) ? '?archive' : '';
}
header('Location: ../subjects.php' . $destination);
