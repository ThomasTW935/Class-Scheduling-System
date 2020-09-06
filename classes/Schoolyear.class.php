<?php

class Schoolyear extends Dbh
{
  protected function tryCatchBlock($sql, $datas = [], $hasReturn = false)
  {
    $stmt;
    try {
      $stmt = $this->connect()->prepare($sql);
      if (!empty($datas)) {
        $data = implode(',', $datas);
        $stmt->execute([$data]);
      } else {
        $stmt->execute();
      }
      if ($hasReturn) {
        $results = $stmt->fetchAll();
        return $results;
      }
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }
  protected function setSchoolyear($data)
  {
    $sql = "INSERT INTO school_year(year, term, operation_start,operation_end) VALUES(?,?,?,?)";
    $this->tryCatchBlock($sql, [$data['year'], $data['term'], $data['start'], $data['end']]);
  }
  protected function updateSchoolyear($data)
  {
    $sql = "UPDATE school_year year = ?, term = ?, operation_start = ?, operation_end = ? WHERE id = ?";
    $this->tryCatchBlock($sql, [$data['year'], $data['term'], $data['start'], $data['end'], $data['id']]);
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
