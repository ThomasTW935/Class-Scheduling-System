<?php

class Professors extends Dbh{
   protected function setProfessors($employeeID,$lastName,$firstName,$middleInitial,$suffix,$deptID){
      $sql = "INSERT INTO professors(emp_no,last_name,first_name,middle_initial,suffix,dept_id) VALUES(?,?,?,?,?,?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$employeeID,$lastName,$firstName,$middleInitial,$suffix,$deptID]);         
   }
   protected function getProfessors(){
      $sql = "select * from professors where is_active = 1";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function getProfessor($empID){
      $sql = "select * from professors where emp_no = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$empID]);
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function deleteProfessor($id){
      $sql = "update professors set is_active=0 where id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute($id);

   }
}