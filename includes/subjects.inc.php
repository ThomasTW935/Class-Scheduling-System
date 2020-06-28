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
}

if (isset($_POST['submit'])) {

   if (!empty($errors)) {
      header('Location: ../subjects.php?add' . $query);
      exit();
   }
   $subjContr->CreateSubject($_POST);
   $subj = $subjView->FetchRoomByLatest();
   $subjID = $subj[0]["subj_id"];
   $schedContr = new SchedulesContr();
   $schedContr->CreateDisplayTime("subj", $subjID);
} else if (isset($_POST['update'])) {

   if (!empty($errors)) {
      header('Location: ../subjessors.php?id=' . $_POST['subjID'] . $query);
      exit();
   }
   $subjContr->ModifySubject($_POST);
} else if (isset($_POST['submitStatus'])) {
   $state = ($_POST['state'] == 0) ? 1 : 0;
   $subjContr->ModifySubjectState($_POST['subjID'], $state);
   $destination = ($_POST['state'] == 0) ? '?archive' : '';
}
header('Location: ../subjects.php' . $destination);
