<?php

class Professors extends Dbh{
   protected function setProfessors($employeeID,$lastName,$firstName,$middleInitial,$suffix,$deptName){
      $sql = "INSERT INTO professors(emp_no,last_name,first_name,middle_initial,suffix,dept_id) VALUES(?,?,?,?,?,?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$employeeID,$lastName,$firstName,$middleInitial,$suffix,$deptName]);         
   }
   protected function getProfessors(){
      $sql = "select * from professors";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
   }
}