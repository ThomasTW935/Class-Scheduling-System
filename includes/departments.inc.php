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
   $query = '&' . http_build_query($errors);
}
if(isset($_POST['submit'])){
   if(!empty($errors)){
      header('Location: ../'. $department .'?add' . $query);
      exit();
   }
   $result = $deptView->FetchDeptByName($_POST['name']);
   if(!empty($result)){
      $deptContr->CreateDepartmentType($_POST['department'], $result[0]['dept_id']);
   } else {
      $deptContr->CreateDepartment($_POST);
   }
} else if(isset($_POST['delete'])){
   $results = $deptView->FetchDeptTypes($_POST['id']);
   $length = sizeof($results);
   if(sizeof($results) > 1){
      $deptContr->RemoveDepartmentType($_POST['department'],$_POST['id']);
   } else{
      $deptContr->RemoveDepartment($_POST['department'],$_POST['id']);
   }
} else if(isset($_POST['update'])){
   if(!empty($errors)){
      header('Location: ../'. $department .'?id='.$_POST['id'] . $query);
      exit();
   }
   $deptContr->ModifyDepartment($_POST);
} 
header('Location: ../'.$department);


