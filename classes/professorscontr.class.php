<?php

class ProfessorsContr extends Professors{
   
   public function CreateProfessors($employeeID,$lastName,$firstName,$middleInitial,$suffix,$deptName){
      $this->setProfessors($employeeID,$lastName,$firstName,$middleInitial,$suffix,$deptName);
   }

}