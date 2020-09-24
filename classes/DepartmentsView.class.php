<?php

class DepartmentsView extends Departments
{

   public function FetchDepts($type, $state, $page = 0, $limit = 0)
   {
      $results = $this->getDepartments($type, $state, $page, $limit);
      return $results;
   }
   public function FetchDeptsWithSect($type, $state, $schoolYearID)
   {
      $results = $this->getDeptartmentsWithSection($type, $state, $schoolYearID);
      return $results;
   }
   public function FetchDeptsWithChecklist($type, $state)
   {
      $results = $this->getDeptartmentsWithChecklist($type, $state);
      return $results;
   }
   public function FetchDeptsBySearch($search, $state, $type, $page = 0, $limit = 0)
   {
      $results = $this->getDepartmentBySearch($search, $state, $type, $page, $limit);
      return $results;
   }
   public function DisplayDepts($results, $page, $totalPages, $destination, $isPrint = false)
   {
      $func = new Functions();
      $func->TableTemplate("dept", $results, $page, $isPrint);
      if (!$isPrint) $func->BuildPagination($page, $totalPages, $destination);
   }
   public function FetchDeptByID($id)
   {
      $results = $this->getDepartmentByID($id);
      return $results;
   }

   public function FetchDeptByNameAndType($name, $type)
   {
      $result = $this->getDepartmentByNameAndType($name, $type);
      return $result;
   }
}
