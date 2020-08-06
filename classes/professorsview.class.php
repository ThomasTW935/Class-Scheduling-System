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
   public function FetchProfessorByLatest()
   {
      $result = $this->getProfessorByLatest();
      return $result;
   }
   public function FetchProfessorsBySearch($search, $state)
   {
      $results = $this->getProfessorsBySearch($search, $state);
      return $results;
   }
   public function FetchProfessorsByState($state, $page = 0, $limit = 0)
   {
      $results = $this->getProfessorsByState($state, $page, $limit);
      return $results;
   }
   public function DisplayProfessorsInSearch($results)
   {
      $schedView = new SchedulesView();
      foreach ($results as $result) {
         // $fullName = "{$result['last_name']}, {$result['first_name']} {$middleInitial} {$result['suffix']}";
         $fullName = $this->GenerateFullName($result['last_name'], $result['first_name'], $result['middle_initial'], $result['suffix']);
         $optionData = $schedView->GenerateOptionDataValue($result['id'], [$fullName, $result['dept_name']]);
         echo "<option data-value='{$optionData['id']}' value='{$optionData['value']}'><ul class='module__List'>
            <li class='module__Item'>" . $fullName . " |</li>
            <li class='module__Item'>" . $result['dept_name'] . "</li></ul></option>";
      }
   }
   public function GenerateFullName($lastName, $firstName, $MI = '', $suffix = '')
   {
      $middleInitial = (!empty($MI)) ? " $MI. " : '';
      $fullName = "$lastName, $firstName$middleInitial$suffix";
      return $fullName;
   }

   public function DisplayProfessors($results, $page)
   {
      echo "<ul class='module__List module__Title'>
               <li class='module__Item'></li>
               <li class='module__Item'>Employee ID</li>
               <li class='module__Item'>Employee Name</li>
               <li class='module__Item'>Department</li>
               <li class='module__Item'>Actions</li>
            </ul>";
      foreach ($results as $result) {
         $imgSrc = $result['prof_img'];
         if (empty($result['prof_img']))
            $imgSrc = "professor.png";
         $iconName = ($result['prof_active'] == 1) ? 'delete' : 'restore';
         $middleInitial = (!empty($result['middle_initial'])) ? $result['middle_initial'] . '.' : '';
         $fullName = "{$result['last_name']}, {$result['first_name']} {$middleInitial} {$result['suffix']}";
         echo "<ul class='module__List'>
            <li class='module__Item'><img src='./drawables/images/" . $imgSrc . "'></li>
            <li class='module__Item'>" . $result['emp_no'] . "</li>
            <li class='module__Item'>" . $fullName . "</li>
            <li class='module__Item'>" . $result['dept_name'] . "</li>
            <li class='module__Item'>
               <div>";
         if ($result['prof_active'] == 1) {
            echo "<form method='POST' action='./schedules.php'>
            <input type='hidden' name='type' value='prof'>
            <input type='hidden' name='id' value='" . $result['id'] . "'>
            <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
            <span>Schedule</span></form>
                  <a href=?page=$page&id=" . $result['id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
         }
         echo "<form onsubmit='return submitForm(this)' action='./includes/professors.inc.php' method='POST'>
                     <input name='page' type='hidden' value='$page'>
                     <input name='id' type='hidden' value='" . $result['id'] . "'>
                     <input name='userID' type='hidden' value='" . $result['user_id'] . "'>
                     <input id='state' name='state' type='hidden' value='" . $result['prof_active'] . "'>
                     <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
                     <span>" . $iconName . "</span>
                  </form>
               </div>
            </li>
         </ul>";
      }
   }
}
