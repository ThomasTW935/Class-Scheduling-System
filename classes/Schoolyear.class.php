<?php

class Schoolyear extends Dbh
{

  protected function setSchoolyear($data)
  {
    $sql = "INSERT INTO school_year(year, term, operation_start,operation_end) VALUES(?,?,?,?)";
    $this->tryCatchBlock($sql, [$data['year'], $data['term'], $data['start'], $data['end']], false, 'School Year');
  }
  protected function updateSchoolyear($data)
  {
    $sql = "UPDATE school_year SET year = ?, term = ?, operation_start = ?, operation_end = ? WHERE id = ?";
    $this->tryCatchBlock($sql, [$data['year'], $data['term'], $data['start'], $data['end'], $data['id']]);
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
    $sql = "SELECT * FROM school_year ORDER BY year,term DESC  $withLimit";
    return $this->tryCatchBlock($sql, [], true);
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
