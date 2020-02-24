<?php

class DepartmentsView extends Departments{

   public function FetchDepts($type){
      $results = $this->getDepartments($type);
      return $results;
   }
   public function FetchDeptByID($id){
      $results = $this->getDepartmentByID($id);
      return $results;
   }
   public function FetchDeptByName($name){
      $results = $this->getDepartmentByName($name);
      return $results;
   }
}