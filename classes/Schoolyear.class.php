<?php

class Schoolyear extends Dbh
{
  private $type = 'School Year';
  protected function setSchoolyear($data)
  {
    $sql = "INSERT INTO school_year(year, operation_start,operation_end) VALUES(?,?,?)";
    $this->tryCatchBlock($sql, [$data['year'], $data['opStart'], $data['opEnd']], false, 'School Year');
  }
  protected function addSchoolYearToProfessors()
  {
    $sql = "INSERT INTO professors_details(prof_id, school_year_id, is_active) SELECT DISTINCT prof_id, (SELECT id FROM school_year ORDER BY id DESC LIMIT 1), is_active FROM professors_details";
    $this->tryCatchBlock($sql, []);
  }
  protected function addSchoolYearToSections()
  {
    $sql = "INSERT INTO sections_details(sect_id, school_year_id, is_active) SELECT DISTINCT sect_id, (SELECT id FROM school_year ORDER BY id DESC LIMIT 1), is_active FROM sections_details";
    $this->tryCatchBlock($sql, []);
  }
  protected function updateSchoolyear($data)
  {
    $sql = "UPDATE school_year SET year = ?, operation_start = ?, operation_end = ? WHERE id = ?";
    $this->tryCatchBlock($sql, [$data['year'], $data['opStart'], $data['opEnd'], $data['id']]);
  }
  protected function updateSchoolyearActive($id)
  {
    $sql = "UPDATE school_year SET is_active = 1 WHERE id = ?";
    $this->tryCatchBlock($sql, [$id]);
  }
  protected function updateSchoolyearDeactive()
  {
    $sql = "UPDATE school_year SET is_active = 0";
    $this->tryCatchBlock($sql, []);
  }


  protected function getSchoolyear($page, $limit)
  {
    $jump = $limit * ($page - 1);
    $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
    $sql = "SELECT * FROM school_year ORDER BY year DESC  $withLimit";
    return $this->tryCatchBlock($sql, [], true);
  }
  protected function getSchoolYearByID($id)
  {
    $sql = "SELECT * FROM school_year WHERE id = ? LIMIT 1";
    return $this->tryCatchBlock($sql, [$id], true, $this->type);
  }
  protected function getOperationHours($id)
  {
    $sql = "SELECT operation_start, operation_end FROM school_year WHERE id = ?";
    return $this->tryCatchBlock($sql, [$id], true);
  }
  protected function getActiveSchoolYear()
  {
    $sql = "SELECT * FROM school_year WHERE is_active = 1 LIMIT 1";
    return $this->tryCatchBlock($sql, [], true);
  }
}
