<?php

class SubjectsView extends Subjects{
   public function DisplaySubjects(){
      $results = $this->getSubjects();
      return $results;
   }
   public function FetchSubjectByCode($code){
      $results = $this->getSubjectByCode($code);
      return $results;
   }
   public function FetchSubjectByID($id){
      $results = $this->getSubjectByID($id);
      return $results;
   }
}