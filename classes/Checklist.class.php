<?php

class Checklist extends Dbh
{
  protected function setChecklist($data)
  {
    $sql = "INSERT INTO checklist(name,dept_id) VALUES(?,?)";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$data['name'], $data['deptID']]);
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
  protected function updateChecklistState($state, $id)
  {
    $sql = "UPDATE checklist SET is_active = ? WHERE id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state, $id]);
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


  // Checklist Subjects

  protected function setChecklistSubject($data)
  {
    $sql = "INSERT INTO subjects_to_checklist(chk_id,subj_id,level_id) VALUES(?,?,?)";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$data['chkID'], $data['subjID'], $data['levelID']]);
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }
  protected function updateChecklistSubject($data)
  {
    $sql = "UPDATE subjects_to_checklist SET subj_id = ?, level_id = ? WHERE id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$data['subjID'], $data['levelID'], $data['stcID']]);
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }
  protected function deleteChecklistSubject($stcID)
  {
    $sql = "DELETE FROM subjects_to_checklist WHERE id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$stcID]);
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }

  protected function getDistinctLevel($id)
  {
    $sql = "SELECT DISTINCT level_id, description FROM subjects_to_checklist stc INNER JOIN level l ON stc.level_id = l.id WHERE chk_id = ? ORDER BY level_id";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }
  protected function getChecklistSubjectsByLevel($id, $levelID)
  {
    $sql = "SELECT * FROM subjects_to_checklist stc INNER JOIN subjects s ON stc.subj_id = s.subj_id WHERE chk_id = ? AND level_id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id, $levelID]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }
  protected function getChecklistSubject($stcID)
  {
    $sql = "SELECT * FROM subjects_to_checklist where id = ? LIMIT 1";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$stcID]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error("Error: $e");
    }
  }
  protected function getChecklistSubjectsByChkID($chkID, $levelID, $sectID)
  {
    $sql = "SELECT stc.id, chk_id, stc.subj_id, subj_code,subj_desc,hours FROM subjects_to_checklist stc 
    INNER JOIN checklist c ON stc.chk_id = c.id
    INNER JOIN subjects s ON stc.subj_id = s.subj_id WHERE chk_id = ? AND stc.level_id = ? ORDER BY subj_desc";
    //  AND s.subj_id NOT IN (SELECT subj_id FROM schedules WHERE sect_id = ?)
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$chkID, $levelID]);
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
