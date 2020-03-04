<?php

class ProfessorsView extends Professors
{

   public function FetchProfessorByEmpID($empID)
   {
      $result = $this->getProfessor($empID);
      return $result;
   }
   public function FetchProfessorByID($id)
   {
      $result = $this->getProfessorByID($id);
      return $result;
   }
   public function FetchProfessorsBySearch($search, $state)
   {
      $results = $this->getProfessorsBySearch($search, $state);
      return $results;
   }
   public function FetchProfessorsByState($state)
   {
      $results = $this->getProfessorsByState($state);
      return $results;
   }
   public function DisplayProfessors($results)
   {
      echo "<ul class='module__List module__Title'>
               <li class='module__Item'></li>
               <li class='module__Item'>Employee ID</li>
               <li class='module__Item'>Employee Name</li>
               <li class='module__Item'>Department</li>
               <li class='module__Item'></li>
               <li class='module__Item'>Actions</li>
            </ul>";
      foreach ($results as $result) {
         $imgSrc = $result['prof_img'];
         if (empty($result['prof_img']))
            $imgSrc = "professor.png";
         $iconName = ($result['is_active'] == 1) ? 'delete' : 'recover';
         $middleInitial = (!empty($result['middle_initial'])) ? $result['middle_initial'] . '.' : '';
         $fullName = "{$result['last_name']}, {$result['first_name']} {$middleInitial} {$result['suffix']}";
         echo "<ul class='module__List'>
            <li class='module__Item'><img src='./drawables/images/" . $imgSrc . "'></li>
            <li class='module__Item'>" . $result['emp_no'] . "</li>
            <li class='module__Item'>" . $fullName . "</li>
            <li class='module__Item'>" . $result['dept_name'] . "</li>
            <li class='module__Item'><a href='#'>CheckSchedule</a></li>
            <li class='module__Item'>
               <div>
                  <a href=?id=" . $result['id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>
                  <form onsubmit='return submitForm(this)' action='./includes/professors.inc.php' method='POST'>
                     <input name='id' type='hidden' value='" . $result['id'] . "'>
                     <input name='status' type='hidden' value='" . $result['is_active'] . "'>
                     <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
                     <span>" . $iconName . "</span>
                  </form>
               </div>
            </li>
         </ul>";
      }
   }
}
