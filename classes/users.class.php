<?php

class Users extends Dbh{

   protected function setUser($username,$pass,$email,$roleLevel){
      $sql = 'INSERT INTO users (username,email,password,role_level) VALUES (?,?,?,?)';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$username,$pass,$email,$roleLevel]);
   }
   protected function updateUser($username,$pass,$email,$roleLevel,$id){
      $sql = 'UPDATE users SET username = ?, email = ?, password = ?, role_level = ? WHERE user_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$username,$pass,$email,$roleLevel,$id]);
   }
   protected function getUsers(){
      $sql = 'SELECT * FROM users INNER JOIN professors ON users.prof_id = professors.prof_id';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
   }
   protected function getUser($id){
      $sql = 'SELECT * FROM users WHERE user_id = ?';
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $results = $stmt->fetchAll();
      return $results;
   }

}