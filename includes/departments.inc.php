<?php

include 'autoloader.inc.php';

if (!isset($_POST)) {
   header('Location: ../dashboard.php');
   exit();
}

$deptView = new DepartmentsView();
$deptContr = new DepartmentsContr();
$deptVal = new DepartmentsVal($_POST);

$department = $_POST['department'];
$page = $_POST['page'];
$destination = "page=$page";

if (!isset($_POST['submitStatus'])) {
   $errors = $deptVal->validateForm();
   if (!empty($errors)) {
      include_once './functions.inc.php';
      $func = new Functions();
      $query = $func->BuildQuery($errors, $_POST);
      $destination .= (isset($_POST['submit'])) ? '&add' : "&id={$_POST['deptID']}";
      header("Location: ../department.php?dept=$department&$destination" . $query);
      exit();
   }
}
if (isset($_POST['submit'])) {
   $deptContr->CreateDepartment($_POST);
} else if (isset($_POST['update'])) {

   $deptContr->ModifyDepartment($_POST);
} else if (isset($_POST['submitStatus'])) {
   $state = ($_POST['state'] == 0) ? 1 : 0;
   $deptContr->ModifyDepartmentState($_POST['deptID'], $state);
   $isArchived = ($_POST['state'] == 0) ? 'archive&' : '';
   $destination = $isArchived . $destination;
}
header("Location: ../department.php?dept=$department&$destination");
