<?php

class ProfessorsContr extends Professors{
   
   public function CreateProfessors($data){
      $this->setProfessors($data['employeeID'],$data['lastName'],$data['firstName'],$data['middleInitial'],$data['suffix'],$data['deptID']);
   }

   public function RemoveProfessor($id){
      $this->deleteProfessor($id);
   }

   public function ModifyProfessor($data){
      $this->updateProfessor($data['id'],$data['employeeID'],$data['lastName'],$data['firstName'],$data['middleInitial'],$data['suffix'],$data['deptID']);
   }

}