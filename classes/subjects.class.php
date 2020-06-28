<?php

class Subjects extends Dbh{
   protected function getSubjectsByState($state){
      $sql = "SELECT * FROM subjects WHERE subj_active = ?";
      try{
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$state]);
         $results = $stmt->fetchAll();
         return $results;
      }catch(PDOException $e){
         trigger_error('Error: '.$e);
      }
   }
   protected function getSubjectByLatest(){
      $sql = "SELECT subj_id FROM subjects ORDER BY subj_id DESC LIMIT 1";
      try{
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute();
         $results = $stmt->fetchAll();
         return $results;
      }catch(PDOException $e){
         trigger_error('Error: '.$e);
      }
   }
   protected function getSubjectsBySearch($search,$state){
      $search = "%{$search}%";
      $sql = "SELECT * FROM subjects WHERE (subj_code LIKE ? OR subj_desc LIKE ?) AND subj_active = ?";
      try{
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$search,$search,$state]);
         $results = $stmt->fetchAll();
         return $results;
      }catch(PDOException $e){
         trigger_error('Error: '.$e);
      }
   }
   protected function getSubjectByCode($code){
      $sql = "SELECT * FROM subjects WHERE subj_code = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$code]);
      $results = $stmt->fetchAll();
      return $results;
   }
   protected function getSubjectByID($id){
      $sql = "SELECT * FROM subjects WHERE subj_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $results = $stmt->fetchAll();
      return $results;
   }
   protected function setSubject($code,$desc,$units){
      $sql = "INSERT INTO subjects(subj_code,subj_desc, units) VALUES(?,?,?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$code,$desc,$units]);
   }
   protected function updateSubject($code,$desc,$units,$id){
      $sql = "UPDATE subjects SET subj_code = ? , subj_desc = ?, units = ? WHERE subj_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$code,$desc,$units,$id]);
   }
   protected function updateSubjectState($id, $state){
      try{
         $sql = "UPDATE subjects SET subj_active = ? WHERE subj_id = ?";
         $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$state,$id]);
      }
      catch(PDOException $e){
         trigger_error('Error: '. $e);
      }
   }
}