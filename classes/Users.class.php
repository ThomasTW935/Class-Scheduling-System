<?php

class Users extends Dbh
{
   protected function setUser($username, $pass, $email)
   {
      $sql = 'INSERT INTO users (username,email,password,prof_id) SELECT ?,?,?, id FROM professors ORDER BY id DESC LIMIT 1';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$username, $pass, $email]);
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function updateUser($username,  $email,   $id)
   {
      $sql = 'UPDATE users SET username = ?, email = ? WHERE user_id = ?';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$username, $email, $id]);
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function updatePassword($newPass, $id)
   {
      $sql = 'UPDATE users SET password = ? WHERE user_id = ?';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$newPass, $id]);
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function updateUserState($state, $id, $schoolYearID)
   {
      $sql = 'UPDATE users u 
      INNER JOIN professors_details pd ON u.prof_id = pd.prof_id 
      SET is_active = ? WHERE user_id = ? AND school_year_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state, $id, $schoolYearID]);
   }
   protected function getUsersByState($schoolYearID, $state, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $sql = "SELECT user_id,username,email,password,u.prof_id,school_year_id, is_active FROM users u 
      INNER JOIN professors_details pd ON u.prof_id = pd.prof_id 
      WHERE school_year_id = ? AND is_active = ? $withLimit";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$schoolYearID, $state]);
         $results = $stmt->fetchAll();
         return $results;
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function getUsersBySearch($search, $schoolYearID, $state, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $search = "%{$search}%";
      $sql = "SELECT user_id,username,email,password,u.prof_id,school_year_id, is_active FROM users u INNER JOIN professors_details pd ON u.prof_id = pd.prof_id 
      WHERE (username LIKE ? OR email LIKE ?) AND school_year_id = ? AND is_active = ? $withLimit";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$search, $search, $schoolYearID, $state]);
         $results = $stmt->fetchAll();
         return $results;
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function getUserByID($id)
   {
      $sql = 'SELECT * FROM users WHERE user_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $results = $stmt->fetchAll();
      return $results;
   }
   protected function getUserByUsername($username)
   {
      $sql = 'SELECT * FROM users WHERE username = ? LIMIT 1';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$username]);
      $results = $stmt->fetchAll();
      return $results;
   }
}
