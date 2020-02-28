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
      foreach($results as $result){
         $fullName = "{$result['last_name']}, {$result['first_name']} {$result['middle_initial']}. {$result['suffix']}"; 
         echo "<ul class='module__List'>
            <li class='module__Item'>". $result['emp_no'] ."</li>
            <li class='module__Item'>". $fullName ."</li>
            <li class='module__Item'>". $result['dept_name'] ."</li>
            <li class='module__Item'><a href='#'>CheckSchedule</a></li>
            <li class='module__Item'><a href=?id=". $result['id'] ."> Edit</a></li>
            <li class='module__Item'>
               <form onsubmit='return submitForm(this)' action='./includes/professors.inc.php' method='POST'>
                  <input name='id' type='hidden' value='". $result['id'] ."'>
                  <button name='delete' type='submit'>Remove</button>
               </form>
            </li>
         </ul>";
      }
   }
}