<?php

class Subjects extends Dbh
{
   protected function getSubjectsByState($state, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $sql = "SELECT * FROM subjects s LEFT JOIN departments d ON s.dept_id = d.dept_id WHERE subj_active = ? ORDER BY dept_name,subj_desc $withLimit ";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$state]);
         $results = $stmt->fetchAll();
         return $results;
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function getSubjectsBySearch($search, $state, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $search = "%{$search}%";
      $sql = "SELECT * FROM subjects s LEFT JOIN departments d ON s.dept_id = d.dept_id WHERE (subj_code LIKE ? OR subj_desc LIKE ?) AND subj_active = ? ORDER BY dept_name,subj_desc $withLimit";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$search, $search, $state]);
         $results = $stmt->fetchAll();
         return $results;
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function getSubjectByCode($code)
   {
      $sql = "SELECT * FROM subjects WHERE subj_code = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$code]);
      $results = $stmt->fetchAll();
      return $results;
   }
   protected function getSubjectByID($id)
   {
      $sql = "SELECT * FROM subjects WHERE subj_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $results = $stmt->fetchAll();
      return $results;
   }
   protected function getSubjectsByDeptID($deptID)
   {
      $sql = "SELECT * FROM subjects s INNER JOIN subjects_to_checklist stc ON s.subj_id = stc.subj_id  WHERE dept_id = ? AND stc.chk_id IN (SELECT chk_id FROM sections) ORDER BY subj_code,subj_desc";
      return $this->tryCatchBlock($sql, [$deptID], true, 'Subjects');
   }
   protected function setSubject($code, $desc, $units, $hours, $deptID, $type)
   {
      $sql = "INSERT INTO subjects(subj_code,subj_desc, units,hours,dept_id,is_laboratory) VALUES(?,?,?,?,?,?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$code, $desc, $units, $hours, $deptID, $type]);
   }
   protected function updateSubject($code, $desc, $units, $hours, $deptID, $type, $id)
   {
      $sql = "UPDATE subjects SET subj_code = ? , subj_desc = ?, units = ?, hours=?, dept_id = ?,is_laboratory = ? WHERE subj_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$code, $desc, $units, $hours, $deptID, $type, $id]);
   }
   protected function updateSubjectState($state, $id)
   {
      try {
         $sql = "UPDATE subjects SET subj_active = ? WHERE subj_id = ?";
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$state, $id]);
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
}
