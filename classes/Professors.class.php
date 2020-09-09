<?php

class Professors extends Dbh
{
   protected function tryCatchBlock($sql, $datas = [], $hasReturn = false)
   {
      $stmt;
      try {
         $stmt = $this->connect()->prepare($sql);
         if (!empty($datas)) {
            $data = implode(', ', $datas);
            $stmt->execute($datas);
         } else {
            $stmt->execute();
         }
         if ($hasReturn) {
            $results = $stmt->fetchAll();
            return $results;
         }
      } catch (PDOException $e) {
         trigger_error("Error Professors: $e");
      }
   }

   protected function setProfessors($employeeID, $lastName, $firstName, $middleInitial, $suffix, $type, $deptID, $imgName)
   {
      $sql = "INSERT INTO professors(emp_no,last_name,first_name,middle_initial,suffix,type,dept_id,prof_img) VALUES(?,?,?,?,?,?,?,?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$employeeID, $lastName, $firstName, $middleInitial, $suffix, $type, $deptID, $imgName]);
   }
   protected function updateProfessorState($state, $profID, $schoolYearID)
   {
      $sql = "UPDATE professors_details SET is_active = ? WHERE prof_id = ? AND school_year_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state,  $profID, $schoolYearID]);
   }
   protected function updateProfessor($id, $empID, $lastName, $firstName, $middleInitial, $suffix, $type, $deptID, $imgName)
   {
      $sql = "UPDATE professors SET emp_no = ?, last_name = ?,first_name = ?,middle_initial = ?,suffix = ?, type = ?, dept_id = ?, prof_img = ? WHERE id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$empID, $lastName, $firstName, $middleInitial, $suffix, $type, $deptID, $imgName, $id]);
   }
   protected function getProfessorsByState($schoolYearID, $state, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $sql = "SELECT p.id,emp_no, last_name,first_name,middle_initial,suffix,CONCAT(last_name,', ', first_name,' ', middle_initial, ' ',suffix ) as full_name,type, p.dept_id,  COALESCE(prof_img,'professor.png') as img , dept_name, school_year_id, pd.is_active FROM professors p 
      INNER JOIN departments d ON p.dept_id = d.dept_id 
      INNER JOIN professors_details pd ON p.id = pd.prof_id
      WHERE school_year_id = ? AND is_active = ? $withLimit";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$schoolYearID, $state]);
         $result = $stmt->fetchAll();
         return $result;
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function getProfessorsBySearch($search, $schoolYearID, $state, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $search = "%{$search}%";
      $sql =   "SELECT p.id,emp_no, last_name,first_name,middle_initial,suffix,CONCAT(last_name,', ', first_name,' ', middle_initial, ' ',suffix ) as full_name,type, p.dept_id, COALESCE(prof_img,'professor.png') as img , dept_name, school_year_id, pd.is_active FROM professors p 
      INNER JOIN departments d ON p.dept_id = d.dept_id 
      INNER JOIN professors_details pd ON p.id = pd.prof_id
      WHERE (emp_no LIKE ? OR last_name LIKE ? OR first_name LIKE ? OR suffix LIKE ? OR type LIKE ? OR dept_name LIKE ?) 
      AND school_year_id = ? AND is_active = ? $withLimit";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$search, $search, $search, $search, $search, $search, $schoolYearID, $state]);
      $results = $stmt->fetchAll();
      return $results;
   }
   protected function getProfessor($empID)
   {
      $sql = "SELECT * FROM professors WHERE emp_no = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$empID]);
      $result = $stmt->fetchAll();
      return $result;
   }
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
   protected function getProfessorsBySubj($schoolYearID, $subjID)
   {
      $sql = "SELECT p.id,emp_no, last_name,first_name,middle_initial,suffix,CONCAT(last_name,', ', first_name,' ', middle_initial, ' ',suffix ) as full_name, school_year_id, dept_name, pd.is_active FROM professors p 
      INNER JOIN departments d ON p.dept_id = d.dept_id
      INNER JOIN professors_details pd ON p.id = pd.prof_id WHERE pd.is_active = 1 AND school_year_id = ? AND p.dept_id = (SELECT dept_id FROM subjects WHERE subj_id = ?)";

      return $this->tryCatchBlock($sql, [$schoolYearID, $subjID], true);
   }

   // Professors Details Queries



   protected function setProfessorDetails($schoolYearID)
   {
      $sql = "INSERT INTO professors_details(prof_id,school_year_id) SELECT id, ? FROM professors ORDER BY id DESC LIMIT 1";
      $this->tryCatchBlock($sql, [$schoolYearID]);
   }
}
