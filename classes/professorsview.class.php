<?php

class ProfessorsView extends Professors{

   public function CheckProfessor($empID){
      $result = $this->getProfessor($empID);
      return $result;
   }
   public function DisplayProfessors(){
      $results = $this->getProfessors();
      foreach($results as $result){
         $fullName = "{$result['last_name']}, {$result['first_name']} {$result['middle_initial']}. {$result['suffix']}"; 
         echo "<ul class='professors__List'>
            <li class='professors__Item'>". $result['emp_no'] ."</li>
            <li class='professors__Item'>". $fullName ."</li>
            <li class='professors__Item'>". $result['dept_id'] ."</li>
            <li class='professors__Item'>CheckSchedule</li>
            <li class='professors__Item'><a href=?id='". $result['id'] ."'>Edit</a></li>
            <li class='professors__Item'><a href=?id='". $result['id'] ."'>Remove</a></li>
         </ul>";
      }
   }
}