<?php

class ProfessorsContr extends Professors{
   
   public function CreateProfessors($employeeID,$lastName,$firstName,$middleInitial,$suffix,$deptName){
      $this->setProfessors($employeeID,$lastName,$firstName,$middleInitial,$suffix,$deptName);
   }

   public function RemoveProfessor($id){
      $this->deleteProfessor($id);
   }

   public function ModifyProfessor($data){
      $this->updateProfessor($data['id'],$data['employeeID'],$data['lastName'],$data['firstName'],$data['middleInitial'],$data['suffix'],$data['deptID']);
   }

}