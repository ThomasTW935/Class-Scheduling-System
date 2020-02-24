<?php

class Departments extends Dbh{
   
   protected function getDepartments($type){
      $sql = 'select * from departments INNER JOIN dept_type ON departments.dept_id = dept_type.dept_id where type = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$type]);
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
   protected function getDepartmentByType($id){
      $sql = 'select * from dept_type where dept_id = ?';
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
      $stmt->connect()->prepare($sql);
      $stmt->execute([$data['name'],$data['desc']]);
   }
   protected function setDepartmentType($type,$id){
      $sql = 'INSERT INTO dept_type(type,dept_id) VALUES(?,?)';
      $stmt->connect()->prepare($sql);
      $stmt->execute([$type,$id]);
   }
}