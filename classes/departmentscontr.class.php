<?php

class DepartmentsContr extends Departments{
   public function CreateDepartment($data){
      $this->setDepartment($data);
   }
   public function CreateDepartmentType($type){
      $id = $this->getDepartmentByName($data['id']);
      $this->setDepartmentType($type,$id);
   }
}