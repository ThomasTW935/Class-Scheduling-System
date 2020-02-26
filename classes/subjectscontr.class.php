<?php

class SubjectsContr extends Subjects{
   public function CreateSubject($data){
      $this->setSubject($data['code'],$data['desc']);
   }
   public function ModifySubject($data){
      $this->setSubject($data['code'],$data['desc'],$data['id']);
   }
   public function RemoveSubject($id){
      $this->deleteSubject($id);
   }
}