<?php

class Professors extends Dbh
{
   protected function setProfessors($employeeID, $lastName, $firstName, $middleInitial, $suffix, $type, $deptID, $imgName)
   {
      $sql = "INSERT INTO professors(emp_no,last_name,first_name,middle_initial,suffix,type,dept_id,prof_img) VALUES(?,?,?,?,?,?,?,?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$employeeID, $lastName, $firstName, $middleInitial, $suffix, $type, $deptID, $imgName]);
   }
   protected function getProfessorsByState($state, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $sql = "SELECT id,emp_no, last_name,first_name,middle_initial,suffix,CONCAT(last_name,', ', first_name,' ', middle_initial, ' ',suffix ) as full_name,type, p.dept_id,prof_active, COALESCE(prof_img,'professor.png') as img , dept_name FROM professors p INNER JOIN departments d ON p.dept_id = d.dept_id WHERE prof_active = ? $withLimit";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$state]);
         $result = $stmt->fetchAll();
         return $result;
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function getProfessorsBySearch($search, $state, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $search = "%{$search}%";
      $sql =   "SELECT id,emp_no, last_name,first_name,middle_initial,suffix,CONCAT(last_name,', ', first_name,' ', middle_initial, ' ',suffix ) as full_name,type, p.dept_id,prof_active, COALESCE(prof_img,'professor.png') as img , dept_name FROM professors p INNER JOIN departments d 
               ON p.dept_id = d.dept_id 
               WHERE (emp_no LIKE ? OR last_name LIKE ? OR first_name LIKE ? OR suffix LIKE ? OR type LIKE ? OR dept_name LIKE ?) AND prof_active = ? $withLimit";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$search, $search, $search, $search, $search, $search, $state]);
      $results = $stmt->fetchAll();
      return $results;
   }
   protected function getProfessor($empID)
   {
      $sql = "select * from professors where emp_no = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$empID]);
      $result = $stmt->fetchAll();
      return $result;
   }
   // protected function getProfessorByUserID($userID)
   // {
   //    $sql = "SELECT id,emp_no, last_name,first_name,middle_initial,suffix,CONCAT(last_name,', ', first_name,' ', middle_initial, ' ',suffix ) as full_name,type, p.dept_id,prof_active, COALESCE(prof_img,'professor.png') as img , dept_name FROM professors p INNER JOIN departments d ON p.dept_id = d.dept_id WHERE user_id = ? LIMIT 1";
   //    try {
   //       $stmt = $this->connect()->prepare($sql);
   //       $stmt->execute([$userID]);
   //       $result = $stmt->fetchAll();
   //       return $result;
   //    } catch (PDOException $e) {
   //       trigger_error("Error: $e");
   //    }
   // }
   protected function getProfessorByID($id)
   {
      $sql = "SELECT * FROM professors p 
      INNER JOIN departments d ON p.dept_id = d.dept_id
      INNER JOIN users u ON p.id = u.prof_id WHERE id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $result = $stmt->fetchAll();
      return $result;
   }

   protected function updateProfessorState($state, $id)
   {
      $sql = "UPDATE professors p INNER JOIN users u ON p.id = u.prof_id SET prof_active = ?,is_active = ? WHERE id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state, $state, $id]);
   }
   protected function updateProfessor($id, $empID, $lastName, $firstName, $middleInitial, $suffix, $type, $deptID, $imgName)
   {
      $sql = "UPDATE professors SET emp_no = ?, last_name = ?,first_name = ?,middle_initial = ?,suffix = ?, type = ?, dept_id = ?, prof_img = ? WHERE id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$empID, $lastName, $firstName, $middleInitial, $suffix, $type, $deptID, $imgName, $id]);
   }
}
