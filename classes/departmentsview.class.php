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
   public function FetchDeptByNameAndType($name,$type){
      $result = $this->getDepartmentByNameAndType($name,$type);
      return $result;
   }
   public function FetchDeptTypes($id){
      $result = $this->getDepartmentTypes($id);
      return $result;
   }
}