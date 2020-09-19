<?php

if (!isset($_POST)) {
  header("Location: ../dashboard.php");
  exit();
}

include './autoloader.inc.php';
$schoolyearContr = new SchoolyearContr();


if (isset($_POST['submit'])) {
  $schoolyearContr->CreateSchoolYear($_POST);
} else if (isset($_POST['update'])) {
  $schoolyearContr->ModifySchoolYear($_POST);
}

header("Location: ../settings.php?page=1");
