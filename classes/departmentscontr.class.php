<?php

class DepartmentsContr extends Departments{
   public function CreateDepartment($data){
      $this->setDepartment($data);
      $result = $this->getDepartmentByName($data['name']);
      $this->CreateDepartmentType($data['department'],$result[0]['dept_id']);
   }
   public function CreateDepartmentType($type,$id){
      $this->setDepartmentType($type,$id);
   }
   public function ModifyDepartment($data){
      $this->updateDepartment($data['name'],$data['desc'],$data['id']);
   }
   public function RemoveDepartment($type,$id){
      $this->deleteDepartment($id);
      $this->deleteDepartmentType($type,$id);
   }
   public function RemoveDepartmentType($type,$id){
      $this->deleteDepartmentType($type,$id);
   }
}