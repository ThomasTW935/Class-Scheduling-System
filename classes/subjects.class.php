<?php

class Subjects extends Dbh{
   protected function getSubjects(){
      $sql = "SELECT * FROM subjects";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
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
   protected function deleteSubject($id){
      $sql = "DELETE FROM subjects WHERE subj_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
   }
}