<?php

include 'autoloader.inc.php';

$subjView = new SubjectsView();
$subjContr = new SubjectsContr();
$subjVal = new SubjectsVal($_POST);

if(!isset($_POST['delete'])){
   $errors = $subjVal->validateForm();
   $query = '&' . http_build_query($errors);
}

if(isset($_POST['submit'])){
   
   if(!empty($errors)){
      header('Location: ../subjects.php?add' . $query);
      exit();
   }
   $subjContr->CreateSubject($_POST);

} else if(isset($_POST['delete'])){

   $subjContr->RemoveSubject($_POST['id']);

} else if(isset($_POST['update'])){

   if(!empty($errors)){
      header('Location: ../subjessors.php?id='.$_POST['id'] . $query);
      exit();
   }
   $subjContr->ModifySubject($_POST);
   var_dump($_POST);
} else {

   header('Location: ../dashboard.php');
   exit();

}

header('Location: ../subjects.php');

