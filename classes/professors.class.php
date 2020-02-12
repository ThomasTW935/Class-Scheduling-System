<?php

class Professors extends Dbh{
   protected function setProfessors(){

   }
   protected function getProfessors(){
      $sql = "select * from professors";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
   }
}