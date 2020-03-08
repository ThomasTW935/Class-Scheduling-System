<?php

class DepartmentsContr extends Departments
{
   public function CreateDepartment($data)
   {
      $this->setDepartment($data['name'], $data['desc'], $data['department']);
   }
   public function ModifyDepartment($data)
   {
      $this->updateDepartment($data['name'], $data['desc'], $data['id']);
   }
   public function ModifyDepartmentState($id, $state)
   {
      $this->updateDepartmentState($id, $state);
   }
}
