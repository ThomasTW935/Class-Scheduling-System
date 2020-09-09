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


   public function FetchProfessorsBySearch($search, $schoolYearID, $state, $page = 0, $limit = 0)
   {
      $results = $this->getProfessorsBySearch($search, $schoolYearID, $state, $page, $limit);
      return $results;
   }
   public function FetchProfessorsByState($schoolYearID, $state, $page = 0, $limit = 0)
   {
      $results = $this->getProfessorsByState($schoolYearID, $state, $page, $limit);
      return $results;
   }
   public function FetchProfessorsBySubj($schoolYearID, $subjID)
   {
      $results = $this->getProfessorsBySubj($schoolYearID, $subjID);
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

   public function DisplayProfessors($results, $page, $totalPages, $destination)
   {
      $func = new Functions();
      $func->TableTemplate("prof", $results, $page);
      $func->BuildPagination($page, $totalPages, $destination);
   }
}
