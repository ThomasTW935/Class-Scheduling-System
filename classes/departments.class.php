<?php

class Departments extends Dbh{
   
   protected function getDepartments($type){
      $sql = 'select * from departments INNER JOIN dept_type ON departments.dept_id = dept_type.dept_id where type = ?';
      $stmt = $this->connect()->prepare($sql);
      try{
         $stmt->execute([$type]);
      }catch(PDOException $e){
         trigger_error("Error: " . $e->getMessage());
      }
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function getDepartmentTypes($id){
      $sql = 'select * from dept_type where dept_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function getDepartmentByNameAndType($name,$type){
      $sql = 'select * from departments INNER JOIN dept_type ON departments.dept_id = dept_type.dept_id where dept_name = ? AND type = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name,$type]);
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function getDepartmentByID($id){
      $sql = 'select * from departments where dept_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function getDepartmentByName($name){
      $sql = 'select * from departments where dept_name = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name]);
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function setDepartment($data){
      $sql = 'INSERT INTO departments(dept_name,dept_desc) VALUES(?,?)';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$data['name'],$data['desc']]);
   }
   protected function setDepartmentType($type,$id){
      $sql = 'INSERT INTO dept_type(type,dept_id) VALUES(?,?)';
      try{
         $stmt = $this->connect()->prepare($sql);
      }catch(PDOException $e){
         trigger_error("Error: " . $e->getMessage());
      }
      $stmt->execute([$type,$id]);
   }
   protected function updateDepartment($name,$desc,$id){
      $sql = 'UPDATE departments SET dept_name = ?, dept_desc = ? WHERE dept_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name,$desc,$id]);
   }
   protected function deleteDepartment($id){
      $sql = 'DELETE FROM departments WHERE dept_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
   }
   protected function deleteDepartmentType($type,$id){
      $sql = 'DELETE FROM dept_type WHERE type = ? AND dept_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$type,$id]);
   }
}