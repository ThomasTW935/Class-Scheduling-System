<?php

class DepartmentsView extends Departments{

   public function FetchDeptFaculty(){
      $results = $this->getDepartmentsFaculty();
      return $results;
   }
   public function FetchDeptFacultyByID($id){
      $results = $this->getDepartmentFacultyByID($id);
      return $results;
   }
}