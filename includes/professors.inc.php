<?php

include 'autoloader.inc.php';

$profView = new ProfessorsView();
$profContr = new ProfessorsContr();
$profVal = new ProfessorsVal($_POST);

if(!isset($_POST['profDelete'])){
   $errors = $profVal->validateForm();
   $query = '&' . http_build_query($errors);
}

if(isset($_POST['submit'])){
   if(!empty($errors)){
      header('Location: ../professors.php?add' . $query);
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
   if(!empty($errors)){
      header('Location: ../professors.php?id='.$_POST['id'] . $query);
      exit();
   }
   var_dump($_POST);
   echo '</br>';
   var_dump($errors);
   $profContr->ModifyProfessor($_POST);
   header('Location: ../professors.php');
} else {
   header('Location: ../dashboard.php');
   exit();
}


