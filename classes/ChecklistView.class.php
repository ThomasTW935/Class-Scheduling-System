<?php

class ChecklistView extends Checklist
{
  public function FetchChecklist($deptID, $state, $page = 0, $limit = 0)
  {
    $results = $this->getChecklist($deptID, $state, $page, $limit);
    return $results;
  }
  public function FetchChecklistByID($id)
  {
    $results = $this->getChecklistByID($id);
    return $results;
  }
  public function DisplayChecklist($results, $page, $totalPages, $destination)
  {
    $func = new Functions();
    $func->TableTemplate("checklist", $results, $page);
    $func->BuildPagination($page, $totalPages, $destination);
  }

  //Levels
  public function FetchLevel($type)
  {
    $results  = $this->getLevels($type);
    return $results;
  }
}
