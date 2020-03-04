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
   protected function getUsers()
   {
      $sql = 'SELECT * FROM users';
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute();
         $results = $stmt->fetchAll();
         return $results;
      } catch (PDOException $e) {
         trigger_error('Error: ' . $e);
      }
   }
   protected function getUser($id)
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
   protected function deleteUser($id)
   {
      $sql = 'SELECT * FROM users WHERE user_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
   }
}
