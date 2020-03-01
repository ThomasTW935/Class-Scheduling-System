<?php

include 'autoloader.inc.php';

$profView = new ProfessorsView();

if(isset($_GET['q'])){
   $results = $profView->FetchProfessorsBySearch($_GET['q']);
   if($_GET['q'] === '')
      $results = $profView->DisplayProfessors();
   
   echo "<ul class='module__List module__Title'>
            <li class='module__Item'></li>
            <li class='module__Item'>Employee ID</li>
            <li class='module__Item'>Employee Name</li>
            <li class='module__Item'>Department</li>
            <li class='module__Item'></li>
            <li class='module__Item'></li>
            <li class='module__Item'></li>
         </ul>";
   foreach($results as $result){
      $imgSrc = $result['prof_img'];
      if(empty($result['prof_img']))
         $imgSrc = "professor.png";
   
      $middleInitial = (!empty($result['middle_initial'])) ? $result['middle_initial'].'.' : '';
      $fullName = "{$result['last_name']}, {$result['first_name']} {$middleInitial} {$result['suffix']}"; 
      echo "<ul class='module__List'>
         <li class='module__Item'><img src='./drawables/images/". $imgSrc ."'></li>
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
