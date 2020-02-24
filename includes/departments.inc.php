<?php

include 'autoloader.inc.php';

if(!isset($_POST)){
   header('Location: ../dashboard.php');
   exit();
}

$deptView = new DepartmentsView();
$deptContr = new DepartmentsContr();
$deptVal = new DepartmentsVal($_POST);

$department = $_POST['department'] . ".php";

if(!isset($_POST['delete'])){
   $errors = $deptVal->validateForm();
   exit();
   $query = '&' . http_build_query($errors);
}

if(isset($_POST['submit'])){
   if(!empty($errors)){
      header('Location: ../'. $department .'?add' . $query);
      exit();
   }
   $deptContr->CreateDepartment($_POST);
} else if(isset($_POST['delete'])){
   $profContr->RemoveProfessor($_POST['id']);
} else if(isset($_POST['update'])){
   if(!empty($errors)){
      header('Location: ../'. $department .'?id='.$_POST['id'] . $query);
      exit();
   }
   $profContr->ModifyProfessor($_POST);
} 
header('Location: ../'.$department);


