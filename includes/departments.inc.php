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
if (!isset($_POST['submitStatus'])) {
   $errors = $deptVal->validateForm();
   $query = '&' . http_build_query($errors);
}
if (isset($_POST['submit'])) {
   if (!empty($errors)) {
      header('Location: ../department.php?dept=' . $department . '&add' . $query);
      exit();
   }

   $deptContr->CreateDepartment($_POST);
} else if (isset($_POST['update'])) {
   if (!empty($errors)) {
      header('Location: ../department.php?dept=' . $department . '&id=' . $_POST['id'] . $query);
      exit();
   }
   $deptContr->ModifyDepartment($_POST);
} else if (isset($_POST['submitStatus'])) {
   $state = ($_POST['state'] == 0) ? 1 : 0;
   $deptContr->ModifyDepartmentState($_POST['id'], $state);
}
header('Location: ../department.php?dept=' . $department);
