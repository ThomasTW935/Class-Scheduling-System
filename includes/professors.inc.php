<?php

include 'autoloader.inc.php';

$profContr = new ProfessorsContr();

if(isset($_POST['submit'])){
   $profVal = new ProfessorsVal($_POST);
   $errors = $profVal->validateForm();
   if(!empty($errors)){
      $query =  http_build_query($errors);
      parse_str($query,$error);
      header('Location: ../professors.php?add&' . $query);
      exit();
   }

   $profContr->CreateProfessors($_POST['employeeID'],$_POST['lastName'],$_POST['firstName'],$_POST['middleInitial'],$_POST['suffix'],$_POST['deptID']);
   header('Location: ../professors.php');
   exit();
} else if(isset($_POST['profDelete'])){
   $profContr->RemoveProfessor($_POST['id']);
   header('Location: ../professors.php');
   exit();
} else if(isset($_POST['update'])){
   $profContr->UpdateProfessor();
} else {
   header('Location: ../dashboard.php');
   exit();
}


