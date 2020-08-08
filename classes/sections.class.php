<?php

class Sections extends Dbh
{
  protected function getSectionsByState($state, $page, $limit)
  {
    $jump = $limit * ($page - 1);
    $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
    $sql = "SELECT * FROM sections INNER JOIN departments ON sections.dept_id = departments.dept_id WHERE sect_active = ? $withLimit";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getSectionsBySearch($search, $state, $page, $limit)
  {
    $jump = $limit * ($page - 1);
    $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
    $search = "%$search%";
    $sql = "SELECT * FROM sections INNER JOIN departments ON sections.dept_id = departments.dept_id WHERE (sect_name LIKE ? OR sect_year LIKE ? OR sect_sem LIKE ? OR dept_name LIKE ?) AND sect_active = ? $withLimit";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$search, $search, $search, $search, $state]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getSectionByID($id)
  {
    $sql = 'SELECT * FROM sections WHERE sect_id = ? LIMIT 1';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getSectionByName($name)
  {
    $sql = 'SELECT * FROM sections WHERE sect_name = ? LIMIT 1';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getSectionByLatest()
  {
    $sql = 'SELECT sect_id FROM sections ORDER BY sect_id DESC LIMIT 1';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }

  protected function setSection($name, $year, $sem, $deptID)
  {
    $sql = "INSERT INTO sections (sect_name,sect_year,sect_sem,dept_id) VALUES(?,?,?,?)";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name, $year, $sem, $deptID]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function updateSection($name, $year, $sem, $deptID, $sectID)
  {
    $sql = 'UPDATE sections SET sect_name = ?, sect_year = ?, sect_sem = ? , dept_id = ? WHERE sect_id = ?';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name, $year, $sem, $deptID, $sectID]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function updateSectionState($state, $id)
  {
    $sql = 'UPDATE sections SET sect_active = ? WHERE sect_id = ?';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state, $id]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
}
