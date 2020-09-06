<?php

class SchoolyearView extends Schoolyear
{
  public function FetchSchoolyear($page = 0, $limit = 0)
  {
    $results = $this->getSchoolyear($page, $limit);
    return $results;
  }
  public function FetchOperationHours($id)
  {
    $results = $this->getOperationHours($id);
    return $results;
  }
  public function FetchActiveSchoolYear()
  {
    $results = $this->getActiveSchoolYear();
    return $results;
  }
  public function DisplaySchoolyear($results, $page, $totalPages, $destination)
  {
    $func = new Functions();
    $func->TableTemplate("schoolyear", $results, $page);
    $func->BuildPagination($page, $totalPages, $destination);
  }
}
