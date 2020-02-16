<?php

class ProfessorsView extends Professors{
   public function DisplayProfessors(){
      $results = $this->getProfessors();
      foreach($results as $result){
         $fullName = "{$result['last_name']}, {$result['first_name']} {$result['middle_initial']}. {$result['suffix']}"; 
         echo "<ul class='professors__List'>
            <li class='professors__Item'>". $result['emp_no'] ."</li>
            <li class='professors__Item'>". $fullName ."</li>
            <li class='professors__Item'>". $result['dept_id'] ."</li>
            <li class='professors__Item'>CheckSchedule</li>
            <li class='professors__Item'>Edit</li>
            <li class='professors__Item'>Remove</li>
         </ul>";
      }
   }
}