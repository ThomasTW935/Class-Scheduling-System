<?php

class SubjectsView extends Subjects
{
   public function FetchSubjectsByState($state, $page = 0, $limit = 0)
   {
      $results = $this->getSubjectsByState($state, $page, $limit);
      return $results;
   }
   public function FetchSubjectsBySearch($search, $state, $page = 0, $limit = 0)
   {
      $results = $this->getSubjectsBySearch($search, $state, $page, $limit);
      return $results;
   }
   public function FetchSubjectByLatest()
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
   public function DisplaySubjects($results, $page, $totalPages, $destination)
   {
      echo "<table class='module__Table'>";
      echo "<thead>";
      echo "<tr class=' '>
            <th class=''>Subject Code</th>
            <th class=''>Subject Description</th>
            <th class=''>Unit/s</th>
            <th >Actions</th>
         </tr>";
      echo "</thead>";
      echo "<tbody>";
      foreach ($results as $result) {
         $iconName = ($result['subj_active'] == 1) ? 'delete' : 'restore';
         echo "<tr class=''>
            <td class=''>" . $result['subj_code'] . "</td>
            <td class=''>" . $result['subj_desc'] . "</td>
            <td class=''>" . $result['units'] . "</td>
            <td class=''>
               <div class='table-actions'>";
         if ($result['subj_active'] == 1) {
            echo "<form method='POST' action='./schedules.php'>
            <input type='hidden' name='type' value='subj'>
            <input type='hidden' name='id' value='" . $result['subj_id'] . "'>
            <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
            <span>Schedule</span></form>
                  <a href='?page=$page&id=" . $result['subj_id'] . "'><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
         }
         echo "<form onsubmit='return submitForm(this)' action='./includes/subjects.inc.php' method='POST'>
                     <input type='hidden' name='page' value='$page'>
                     <input name='subjID' type='hidden' value='" . $result['subj_id'] . "'>
                     <input id='state' name='state' type='hidden' value='" . $result['subj_active'] . "'>
                     <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
                     <span>" . $iconName . "</span>
                  </form>
               </div>
            </td>
         </tr>";
      }
      echo "</tbody>";
      echo "</table>";

      $func = new Functions();
      $func->BuildPagination($page, $totalPages, $destination);
   }
}
