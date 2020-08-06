<?php

class Dbh
{

   private $host = 'localhost';
   private $user = "root";
   private $pwd = "";
   private $dbName = "ClassSchedulingSystem";
   // private $host = 'us-cdbr-east-02.cleardb.com';
   // private $user = "b9e547a06bfec3";
   // private $pwd = "0e937125";
   // private $dbName = "heroku_47a94c0a6cb5111";

   protected function connect()
   {
      try {
         $dsn = "mysql:host=" . $this->host . "; dbname=" . $this->dbName;
         $pdo = new PDO($dsn, $this->user, $this->pwd);
         $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
         return $pdo;
      } catch (PDOException $e) {
         print "Error!: " . $e->getMessage() . "<br/>";
         die();
      }
   }
}
