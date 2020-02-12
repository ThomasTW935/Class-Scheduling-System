<?php

class Dbh {
   private $host = "localhost";
   private $user = "root";
   private $pwd = "";
   private $dbName = "ClassSchedulingSystem";

   protected function connect(){
      $dsn = 'mysql:host='. $this->$host .';dbname='. $this->$dbName;
      $pdo = new PDO($dsn, $this->user, $this->$pwd);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
   }
   private function sql(){
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
                PRIMARY KEY (`dept_id`)"
      ];
   }
}
