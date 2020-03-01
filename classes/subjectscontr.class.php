<?php

class SubjectsContr extends Subjects{
   public function CreateSubject($data){
      $this->setSubject($data['code'],$data['desc'],$data['units']);
   }
   public function ModifySubject($data){
      $this->updateSubject($data['code'],$data['desc'],$data['units'],$data['id']);
   }
   public function RemoveSubject($id){
      $this->deleteSubject($id);
   }
}