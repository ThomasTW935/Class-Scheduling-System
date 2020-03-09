<?php

class Departments extends Dbh
{

   protected function getDepartments($type, $state)
   {
      $sql = 'SELECT * FROM departments WHERE dept_type = ? AND dept_active = ?';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$type, $state]);
         $result = $stmt->fetchAll();
         return $result;
      } catch (PDOException $e) {
         trigger_error("Error: " . $e->getMessage());
      }
   }
   protected function getDepartmentByNameAndType($name, $type)
   {
      $sql = 'SELECT * FROM departments WHERE dept_name = ? AND dept_type = ?';
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
      $sql = 'SELECT * FROM departments WHERE dept_id = ?';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$id]);
         $result = $stmt->fetchAll();
         return $result;
      } catch (PDOException $e) {
         trigger_error("Error: " . $e->getMessage());
      }
   }
   protected function getDepartmentBySearch($search, $state, $type)
   {
      $search = "%{$search}%";
      $sql = 'SELECT * FROM departments WHERE (dept_name LIKE ? OR dept_desc LIKE ?) AND dept_active = ? AND dept_type = ?';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$search,$search,$state,$type]);
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
