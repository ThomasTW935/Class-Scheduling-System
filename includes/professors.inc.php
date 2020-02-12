<?php


if(!isset($_POST['submit'])){
   header('Location: ../dashboard.php');
   exit();
}

include 'autoloader.inc.php';

$employeeID = $_POST['employeeID'];
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$middleInitial = $_POST['middleInitial'];
$suffix = $_POST['suffix'];
$deptName = $_POST['deptName'];


$prof = ['employeeID'=> $employeeID, 
         'lastName'=> $lastName,
         'firstName'=> $firstName,
         'middleInitial'=> $middleInitial,
         'suffix'=> $suffix,
         'deptName'=> $deptName
      ];

$profClass = new ProfessorsContr();
$profClass->CreateProfessors($employeeID,$lastName,$firstName,$middleInitial,$suffix,$deptName);