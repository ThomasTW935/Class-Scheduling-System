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

  // CheckList Subjects

  public function FetchDistinctLevel($id)
  {
    $results = $this->getDistinctLevel($id);
    return $results;
  }
  public function FetchChecklistSubjectsByLevel($id, $levelID)
  {
    $results = $this->getChecklistSubjectsByLevel($id, $levelID);
    return $results;
  }
  public function FetchChecklistSubject($stcID)
  {
    $results = $this->getChecklistSubject($stcID);
    return $results;
  }
  public function FetchChecklistSubjectBySubjIDAndLevelID($chkID, $subjID, $levelID)
  {
    $results = $this->getChecklistSubjectBySubjiDAndLevelID($chkID, $subjID, $levelID);
    return $results;
  }
  public function FetchCheclistSubjectsByChkID($chkID, $levelID, $sectID)
  {
    $results = $this->getChecklistSubjectsByChkID($chkID, $levelID, $sectID);
    return $results;
  }

  //Levels
  public function FetchLevel($type)
  {
    $results  = $this->getLevels($type);
    return $results;
  }
}
