<?php

class Departments extends Dbh{
   
   protected function getDepartmentsFaculty(){
      $sql = 'select * from dept_faculty';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function getDepartmentFacultyByID($id){
      $sql = 'select * from dept_faculty where dept_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function getDepartmentsStudent(){
      $sql = 'select * from dept_student';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
   }
}