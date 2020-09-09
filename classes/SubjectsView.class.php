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
   public function FetchSubjectsByDeptID($deptID)
   {
      $results = $this->getSubjectsByDeptID($deptID);
      return $results;
   }

   public function DisplaySubjectsInSearch($results)
   {
      $schedView = new SchedulesView();
      foreach ($results as $result) {
         $optionData = $schedView->GenerateOptionDataValue($result['subj_id'], [$result['subj_code'], $result['subj_desc']]);
         echo "<option data-value='{$optionData['id']}' value='{$optionData['value']}'><ul class='module__List'>
            <li class='module__Item'>" . $result['subj_code'] . " |</li>
            <li class='module__Item'>" . $result['subj_desc'] . "</li>
            </ul></option>";
      }
   }
   public function DisplaySubjects($results, $page, $totalPages, $destination)
   {
      $func = new Functions();
      $func->TableTemplate("subj", $results, $page);
      $func->BuildPagination($page, $totalPages, $destination);
   }
}
