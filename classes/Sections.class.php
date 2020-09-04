<?php

class Sections extends Dbh
{
  protected function getSectionsByState($state, $page, $limit)
  {
    $jump = $limit * ($page - 1);
    $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
    $sql = "SELECT sect_id,sect_name,chk_id,level_id, l.description as sect_year, c.dept_id, dept_name, dept_desc, sect_active FROM sections s 
    LEFT JOIN level l ON s.level_id = l.id
    LEFT JOIN checklist c ON c.id = s.chk_id
    LEFT JOIN departments d ON c.dept_id = d.dept_id WHERE sect_active = ? $withLimit";
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
    $sql = "SELECT sect_id,sect_name,chk_id,level_id, l.description as sect_year, c.dept_id, dept_name, dept_desc, sect_active FROM sections s 
    LEFT JOIN level l ON s.level_id = l.id
    LEFT JOIN checklist c ON c.id = s.chk_id
    LEFT JOIN departments d ON c.dept_id = d.dept_id  
    WHERE (sect_name LIKE ? OR sect_year LIKE ? OR dept_name LIKE ?) AND sect_active = ? $withLimit";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$search, $search, $search, $state]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getSectionByID($id)
  {
    $sql = "SELECT sect_id,sect_name,chk_id,level_id, l.description as sect_year, c.dept_id, dept_name, dept_desc, sect_active FROM sections s 
    LEFT JOIN level l ON s.level_id = l.id
    LEFT JOIN checklist c ON c.id = s.chk_id
    LEFT JOIN departments d ON c.dept_id = d.dept_id  WHERE sect_id = ? LIMIT 1";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getSectionByDept($deptID)
  {
    $sql = "SELECT sect_id,sect_name,level_id, description as sect_year, sect_active FROM sections s 
    INNER JOIN level l ON s.level_id = l.id WHERE dept_id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$deptID]);
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

  protected function setSection($name, $chkID, $levelID)
  {
    $sql = "INSERT INTO sections (sect_name,chk_id,level_id) VALUES(?,?,?)";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name, $chkID, $levelID]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function updateSection($name, $chkID, $levelID, $sectID)
  {
    $sql = 'UPDATE sections SET sect_name = ?, chk_id = ?, level_id = ? WHERE sect_id = ?';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name, $chkID, $levelID, $sectID]);
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
