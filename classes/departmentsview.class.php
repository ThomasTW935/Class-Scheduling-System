<?php

class DepartmentsView extends Departments{

   public function showDeptFaculty(){
      $results = $this->getDepartmentFaculty();
      echo " Name  Description </br>";
      foreach($results as $result){
         echo " {$result['dept_name']} {$result['dept_desc']} </br>";
      }
   }
}