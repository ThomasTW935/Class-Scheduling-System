<?php

class Departments extends Dbh
{

   protected function getDepartments($type, $state, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $sql = "SELECT * FROM departments WHERE dept_type = ? AND dept_active = ? ORDER BY dept_name $withLimit";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$type, $state]);
         $result = $stmt->fetchAll();
         return $result;
      } catch (PDOException $e) {
         trigger_error("Error: " . $e->getMessage());
      }
   }
   protected function getDeptartmentsWithChecklist($type, $state)
   {
      $sql = "SELECT DISTINCT c.dept_id, dept_name FROM departments d 
      INNER JOIN checklist c ON c.dept_id = d.dept_id
      WHERE dept_type = ? AND dept_active = ?";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$type, $state]);
         $result = $stmt->fetchAll();
         return $result;
      } catch (PDOException $e) {
         trigger_error("Error: " . $e->getMessage());
      }
   }
   protected function getDeptartmentsWithSection($type, $state, $schoolYearID)
   {
      $sql = "SELECT * FROM departments d WHERE dept_type = ? AND dept_active = ? 
      AND dept_id IN(SELECT dept_id FROM sections s 
      INNER JOIN checklist c ON s.chk_id = c.id 
      INNER JOIN sections_details sd ON s.sect_id = sd.sect_id 
      WHERE school_year_id = ? AND sd.is_active = 1)";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$type, $state, $schoolYearID]);
         $result = $stmt->fetchAll();
         return $result;
      } catch (PDOException $e) {
         trigger_error("Error: " . $e->getMessage());
      }
   }
   protected function getDepartmentByNameAndType($name, $type)
   {
      $sql = 'SELECT * FROM departments WHERE dept_name = ? AND dept_type = ? LIMIT 1';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$name, $type]);
         $result = $stmt->fetchAll();
         return $result;
      } catch (PDOException $e) {
         trigger_error("Error: " . $e->getMessage());
      }
   }
   protected function getDepartmentByID($id)
   {
      $sql = 'SELECT * FROM departments WHERE dept_id = ? LIMIT 1';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$id]);
         $result = $stmt->fetchAll();
         return $result;
      } catch (PDOException $e) {
         trigger_error("Error: " . $e->getMessage());
      }
   }
   protected function getDepartmentBySearch($search, $state, $type, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $search = "%{$search}%";
      $sql = "SELECT * FROM departments WHERE (dept_name LIKE ? OR dept_desc LIKE ?) AND dept_active = ? AND dept_type = ? $withLimit";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$search, $search, $state, $type]);
         $result = $stmt->fetchAll();
         return $result;
      } catch (PDOException $e) {
         trigger_error("Error: " . $e->getMessage());
      }
   }
   protected function setDepartment($name, $desc, $type)
   {
      $sql = 'INSERT INTO departments(dept_name,dept_desc,dept_type) VALUES(?,?,?)';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$name, $desc, $type]);
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function updateDepartment($name, $desc, $id)
   {
      $sql = 'UPDATE departments SET dept_name = ?, dept_desc = ? WHERE dept_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name, $desc, $id]);
   }
   protected function updateDepartmentState($id, $state)
   {
      $sql = 'UPDATE departments SET dept_active = ? WHERE dept_id = ?';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$state, $id]);
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
}
