<?php

class Sections extends Dbh
{
  private $type = 'Sections';
  protected function getSectionsByState($schoolYearID, $state, $page, $limit)
  {
    $jump = $limit * ($page - 1);
    $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
    $sql = "SELECT s.sect_id,sect_name,chk_id,level_id, l.description as sect_year, c.dept_id, dept_name, dept_desc,school_year_id, sd.is_active FROM sections s 
    LEFT JOIN level l ON s.level_id = l.id
    LEFT JOIN checklist c ON c.id = s.chk_id
    LEFT JOIN departments d ON c.dept_id = d.dept_id 
    INNER JOIN sections_details sd ON s.sect_id = sd.sect_id WHERE school_year_id = ? AND sd.is_active = ? ORDER BY dept_name,sect_name $withLimit";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$schoolYearID, $state]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getSectionsBySearch($search, $schoolYearID, $state, $page, $limit)
  {
    $jump = $limit * ($page - 1);
    $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
    $search = "%$search%";
    $sql = "SELECT s.sect_id,sect_name,chk_id,level_id, l.description as sect_year, c.dept_id, dept_name, dept_desc,school_year_id, sd.is_active FROM sections s 
    LEFT JOIN level l ON s.level_id = l.id
    LEFT JOIN checklist c ON c.id = s.chk_id
    LEFT JOIN departments d ON c.dept_id = d.dept_id  
    INNER JOIN sections_details sd ON s.sect_id = sd.sect_id
    WHERE (sect_name LIKE ? OR l.description LIKE ? OR dept_name LIKE ?) AND school_year_id = ? AND sd.is_active = ? ORDER BY sect_name,dept_name $withLimit";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$search, $search, $search, $schoolYearID, $state]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getSectionByID($id)
  {
    $sql = "SELECT s.sect_id,sect_name,chk_id,level_id, l.description as sect_year, c.dept_id, dept_name, dept_desc,school_year_id, sd.is_active FROM sections s 
    LEFT JOIN level l ON s.level_id = l.id
    LEFT JOIN checklist c ON c.id = s.chk_id
    LEFT JOIN departments d ON c.dept_id = d.dept_id
    INNER JOIN sections_details sd ON s.sect_id = sd.sect_id
    WHERE s.sect_id = ? LIMIT 1";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getSectionByDept($deptID, $schoolYearID)
  {
    $sql = "SELECT s.sect_id,sect_name,level_id, description as sect_year, sd.is_active FROM sections s 
    INNER JOIN checklist c ON c.id = s.chk_id
    INNER JOIN level l ON s.level_id = l.id
    INNER JOIN sections_details sd ON s.sect_id = sd.sect_id
     WHERE dept_id = ? AND school_year_id = ? AND sd.is_active = 1 ORDER BY sect_name";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$deptID, $schoolYearID]);
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
  protected function getSectionsBySubj($schoolYearID, $subjID)
  {
    $sql = "SELECT * FROM sections s INNER JOIN sections_details sd ON s.sect_id = sd.sect_id 
    WHERE school_year_id = ? AND is_active = 1 
    AND chk_id IN (SELECT chk_id FROM subjects_to_checklist WHERE subj_id = ? AND level_id = s.level_id)";
    return $this->tryCatchBlock($sql, [$schoolYearID, $subjID], true, $this->type);
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
  protected function setSectionDetails($schoolYearID)
  {
    $sql = "INSERT INTO sections_details (sect_id,school_year_id,is_active) SELECT sect_id, $schoolYearID, 1 FROM sections ORDER BY sect_id DESC LIMIT 1";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
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
  protected function updateSectionState($state, $schoolYearID, $id)
  {
    $sql = 'UPDATE sections_details SET is_active = ? WHERE school_year_id = ? AND sect_id = ?';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state, $schoolYearID, $id]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
}
