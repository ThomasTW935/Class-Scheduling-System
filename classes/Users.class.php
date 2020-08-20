<?php

class Users extends Dbh
{

   protected function setUser($username, $pass, $email, $roleLevel)
   {
      $sql = 'INSERT INTO users (username,email,password,role_level) VALUES (?,?,?,?)';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$username, $pass, $email, $roleLevel]);
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function updateUser($username,  $email, $pass, $roleLevel, $id)
   {
      $sql = 'UPDATE users SET username = ?, email = ?, password = ?, role_level = ? WHERE user_id = ?';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$username, $email, $pass, $roleLevel, $id]);
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function updateUserState($state, $id)
   {
      $sql = 'UPDATE users SET is_active = ? WHERE user_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state, $id]);
   }
   protected function getUsersByState($state, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $sql = "SELECT * FROM users WHERE is_active = ? $withLimit";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$state]);
         $results = $stmt->fetchAll();
         return $results;
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function getUsersBySearch($search, $state, $page, $limit)
   {
      $jump = $limit * ($page - 1);
      $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
      $search = "%{$search}%";
      $sql = "SELECT * FROM users WHERE (username LIKE ? OR email LIKE ? OR role_level LIKE ?) AND is_active = ? $withLimit";
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$search, $search, $search, $state]);
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
