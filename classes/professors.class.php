<?php

class Professors extends Dbh
{
   protected function setProfessors($employeeID, $lastName, $firstName, $middleInitial, $suffix, $deptID, $imgName)
   {
      $sql = "INSERT INTO professors(emp_no,last_name,first_name,middle_initial,suffix,dept_id,prof_img) VALUES(?,?,?,?,?,?,?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$employeeID, $lastName, $firstName, $middleInitial, $suffix, $deptID, $imgName]);
   }
   protected function getProfessorsByState($state)
   {
      $sql = "SELECT * FROM professors INNER JOIN departments ON professors.dept_id = departments.dept_id WHERE is_active = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state]);
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function getProfessor($empID)
   {
      $sql = "select * from professors where emp_no = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$empID]);
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function getProfessorByID($id)
   {
      $sql = "select * from professors where id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $result = $stmt->fetchAll();
      return $result;
   }
   protected function getProfessorsBySearch($search, $state)
   {
      $search = "%{$search}%";
      $sql =   "SELECT * FROM professors INNER JOIN departments 
               ON professors.dept_id = departments.dept_id 
               WHERE (emp_no LIKE ? OR last_name LIKE ? OR first_name LIKE ? OR suffix LIKE ? OR dept_name LIKE ?) AND professors.is_active = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$search, $search, $search, $search, $search, $state]);
      $results = $stmt->fetchAll();
      return $results;
   }
   protected function updateProfessorState($state, $id)
   {
      $sql = "update professors set is_active=? where id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state, $id]);
   }
   protected function updateProfessor($id, $empID, $lastName, $firstName, $middleInitial, $suffix, $deptID, $imgName)
   {
      $sql = "update professors set emp_no = ?, last_name = ?,first_name = ?,middle_initial = ?,suffix = ?,dept_id = ?, prof_img = ? where id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$empID, $lastName, $firstName, $middleInitial, $suffix, $deptID, $imgName, $id]);
   }
}
