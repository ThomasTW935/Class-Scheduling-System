<?php

class Checklist extends Dbh
{
  protected function setChecklist($data)
  {
    $sql = "INSERT INTO checklist(name) VALUES(?)";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$data['name']]);
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }
  protected function updateChecklist($data)
  {
    $sql = "UPDATE checklist SET name = ? WHERE id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$data['name'], $data['id']]);
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }
  protected function getChecklist($deptID, $state, $page, $limit)
  {
    $jump = $limit * ($page - 1);
    $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
    $sql = "SELECT * FROM checklist c INNER JOIN departments d ON c.dept_id = d.dept_id WHERE c.dept_id = ? AND is_active = ? $withLimit";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$deptID, $state]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }
  protected function getChecklistByID($id)
  {
    $sql = "SELECT * FROM checklist c INNER JOIN departments d ON c.dept_id = d.dept_id WHERE id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }

  // Levels
  protected function getLevels($type)
  {
    $sql = "SELECT * FROM level WHERE type = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$type]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }
}
