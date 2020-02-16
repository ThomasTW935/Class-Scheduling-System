<?php

if(!isset($_POST['submit'])){
   header('Location: ../dashboard.php');
   exit();
}

include 'autoloader.inc.php';

$validation = new ProfessorsVal($_POST);
$errors = $validation->validateForm();
if(!empty($errors)){
   $query =  http_build_query($errors);
   parse_str($query,$error);
   header('Location: ../professors.php?add&' . $query);
   exit();
}

$profClass = new ProfessorsContr();
$profClass->CreateProfessors($_POST['employeeID'],$_POST['lastName'],$_POST['firstName'],$_POST['middleInitial'],$_POST['suffix'],$_POST['deptID']);
header('Location: ../professors.php');