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
   // $herokuHost = mysql -u b9e547a06bfec3 -h us-cdbr-east-02.cleardb.com -p heroku_47a94c0a6cb5111 < classschedulingsystem.sql

   protected function connect()
   {
      try {
         $dsn = "mysql:host=" . $this->host . "; dbname=" . $this->dbName;
         $pdo = new PDO($dsn, $this->user, $this->pwd);
         // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $pdo;
      } catch (PDOException $e) {
         print "Database Error: " . $e->getMessage() . "<br/>";
         die();
      }
   }
   protected function tryCatchBlock($sql, $datas = [], $hasReturn = false, $type = '')
   {
      try {
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute($datas);
         if ($hasReturn) {
            $results = $stmt->fetchAll();
            return $results;
         }
      } catch (PDOException $e) {
         trigger_error("Error $type: $e");
      }
   }
}
