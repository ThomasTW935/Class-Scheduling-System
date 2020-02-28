<?php

include 'autoloader.inc.php';

$profView = new ProfessorsView();
$profContr = new ProfessorsContr();
$profVal = new ProfessorsVal($_POST);

$middleInitial = explode('.',$_POST['middleInitial']);
$_POST['middleInitial'] = strtoupper(implode('', $middleInitial));

if(!isset($_POST['delete'])){
   $errors = $profVal->validateForm();
   
   $imgFile = $_FILES['image'];
   if(isset($imgFile)){
      $imgName = $imgFile['name'];
      $imgError = $imgFile['error'];
      $imgNameArray = explode('.', $imgName);
      $imgExt = strtolower(end($imgNameArray));
      $imgFullName = $_POST['lastName'].'.'.uniqid().'.'.$imgExt;

      $_POST += ['image'=>$imgFullName];
   
      if(!empty($imgError))
         $errors += ['image' => $imgError];
   }

   $query = '&' . http_build_query($errors);
}

if(isset($_POST['submit'])){

   if(!empty($errors)){
      header('Location: ../professors.php?add' . $query);
      exit();
   }  

   $profContr->CreateProfessors($_POST);

} else if(isset($_POST['delete'])){
   $profContr->RemoveProfessor($_POST['id']);

} else if(isset($_POST['update'])){
   
   if(!empty($errors)){
      header('Location: ../professors.php?id='.$_POST['id'] . $query);
      exit();
   }
   $profContr->ModifyProfessor($_POST);

} else {
   header('Location: ../dashboard.php');
   exit();
}


if(isset($imgFile)){
   $imgDestination = "../drawables/images/".$imgFullName;
   $imgTempname = $imgFile['tmp_name'];
   move_uploaded_file($imgTempname,$imgDestination);
}
header('Location: ../professors.php');


