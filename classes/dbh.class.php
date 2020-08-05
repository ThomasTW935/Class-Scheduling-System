<?php

class Dbh
{

   // private $host = 'localhost';
   // private $user = "root";
   // private $pwd = "";
   // private $dbName = "ClassSchedulingSystem";
   private $host = 'us-cdbr-east-02.cleardb.com';
   private $user = "b9e547a06bfec3";
   private $pwd = "0e937125";
   private $dbName = "heroku_47a94c0a6cb5111";

   protected function connect()
   {
      try {
         $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
         $pdo = new PDO($dsn, $this->user, $this->pwd);
         $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
         return $pdo;
      } catch (PDOException $e) {
         trigger_error("Error: " . $e->getMessage());
      }
   }
   private function sql()
   {
      $tables = [
         'CREATE TABLE `classschedulingsystem`.`dept_faculty` ( 
            `dept_id` INT(2) NOT NULL AUTO_INCREMENT , 
            `dept_name` VARCHAR(5) NOT NULL , 
            `dept_desc` TEXT NOT NULL , 
            PRIMARY KEY (`dept_id`))',
         "CREATE TABLE `classschedulingsystem`.`dept_student` ( 
               `dept_id` INT(2) NOT NULL AUTO_INCREMENT , 
               `dept_name` VARCHAR(5) NOT NULL , 
               `dept_desc` TEXT NOT NULL , 
               `dept_type` ENUM('shs','tertiary') NOT NULL ,
                PRIMARY KEY (`dept_id`)",
         "CREATE TABLE `classschedulingsystem`.`professors` ( `id` INT NOT NULL AUTO_INCREMENT , `emp_no` INT NOT NULL , `last_name` TINYTEXT NOT NULL , `first_name` TINYTEXT NOT NULL , `middle_initital` TINYTEXT NOT NULL , `suffix` TINYTEXT NOT NULL , `dept_id` INT NOT NULL , PRIMARY KEY (`id`))"
      ];
   }
}
