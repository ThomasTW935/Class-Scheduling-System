<?php

class Departments extends Dbh{
   
   protected function getDepartmentFaculty(){
      $sql = 'select * from dept_faculty';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function getDepartmentStudent(){
      $sql = 'select * from dept_student';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
   }
}