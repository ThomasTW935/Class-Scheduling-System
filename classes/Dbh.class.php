<?php
class Dbh extends Environment
{
   protected function connect()
   {
      try {

         $dsn = "mysql:host=" . $this->getHost() . "; dbname=" . $this->getDBName();
         $pdo = new PDO($dsn, $this->getUser(), $this->getPassword());
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
