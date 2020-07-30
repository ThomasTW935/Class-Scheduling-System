<?php

class SubjectsView extends Subjects
{
   public function FetchSubjectsByState($state)
   {
      $results = $this->getSubjectsByState($state);
      return $results;
   }
   public function FetchSubjectsBySearch($search, $state)
   {
      $results = $this->getSubjectsBySearch($search, $state);
      return $results;
   }
   public function FetchSubjectsByLatest()
   {
      $results = $this->getSubjectByLatest();
      return $results;
   }
   public function FetchSubjectByCode($code)
   {
      $results = $this->getSubjectByCode($code);
      return $results;
   }
   public function FetchSubjectByID($id)
   {
      $results = $this->getSubjectByID($id);
      return $results;
   }
   public function DisplaySubjectsInSearch($results)
   {
      $schedView = new SchedulesView();
      foreach ($results as $result) {
         $unit = $result['units'] . " Unit/s";
         $optionData = $schedView->GenerateOptionDataValue($result['subj_id'], [$result['subj_code'], $result['subj_desc'], $unit]);
         echo "<option data-value='{$optionData['id']}' value='{$optionData['value']}'><ul class='module__List'>
            <li class='module__Item'>" . $result['subj_code'] . " |</li>
            <li class='module__Item'>" . $result['subj_desc'] . " |</li>
            <li class='module__Item'>" . $result['units'] . "Unit/s</li></ul></option>";
      }
   }
   public function DisplaySubjects($results)
   {
      echo "<ul class='module__List module__Title'>
         <li class='module__Item'>Subject Code</li>
         <li class='module__Item'>Subject Description</li>
         <li class='module__Item'>Unit/s</li>
         <li class='module__Item'>Actions</li>
      </ul>";
      foreach ($results as $result) {
         $iconName = ($result['subj_active'] == 1) ? 'delete' : 'restore';
         echo "<ul class='module__List'>
            <li class='module__Item'>" . $result['subj_code'] . "</li>
            <li class='module__Item'>" . $result['subj_desc'] . "</li>
            <li class='module__Item'>" . $result['units'] . "</li>
            <li class='module__Item'>
               <div>";
         if ($result['subj_active'] == 1) {
            echo "<form method='POST' action='./schedules.php'>
            <input type='hidden' name='type' value='subj'>
            <input type='hidden' name='id' value='" . $result['subj_id'] . "'>
            <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
            <span>Schedule</span></form>
                  <a href='?id=" . $result['subj_id'] . "'><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
         }
         echo "<form onsubmit='return submitForm(this)' action='./includes/subjects.inc.php' method='POST'>
                     <input name='subjID' type='hidden' value='" . $result['subj_id'] . "'>
                     <input id='state' name='state' type='hidden' value='" . $result['subj_active'] . "'>
                     <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
                     <span>" . $iconName . "</span>
                  </form>
               </div>
            </li>
         </ul>";
      }
   }
}
