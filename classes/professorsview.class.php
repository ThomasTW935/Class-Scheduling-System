<?php

class ProfessorsView extends Professors{

   public function FetchProfessorByEmpID($empID){
      $result = $this->getProfessor($empID);
      return $result;
   }
   public function FetchProfessorByID($id){
      $result = $this->getProfessorByID($id);
      return $result;
   }
   public function DisplayProfessors(){
      $results = $this->getProfessors();
      return $results;
   }
}