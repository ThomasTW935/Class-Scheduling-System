<?php

class DepartmentsVal{
   private $data;
   private $errors = [];
   private static $fields = ['name','desc'];
   public function __construct($post_data)
   {
      $this->data = $post_data;
   }
   public function validateForm(){
      foreach(self::$fields as $field){
         if(!array_key_exists($field, $this->data)){
            trigger_error("$field is not present in data");
            return;
         }
      }

      $this->validateID();
      $this->validateDescription();

      return $this->errors;
   }
   private function validateID(){

      $val = trim($this->data['name']);
      $id = trim($this->data['id']);
      if(empty($val)){
         $this->addError('name','Name cannot be empty');
      }
      else if(!preg_match('/^[a-zA-Z ]{0,5}$/', $val)){
         $this->addError('name', 'Name must only contain and up to 5 chars only');
      }
      else{
         $deptView = new DepartmentsView();
         $result = $deptView->FetchDeptByName($val);
         if(!empty($result)){
            if(isset($this->data['update'])){
               $prof = $profView->FetchProfessorByID($id);
               $idOrig = $prof[0]['id'] ?? '';
               $idGet = $result[0]['id'] ?? '';
               if($idOrig == $idGet){
                  return;
               }
            }
            $this->addError('employeeID', 'Employee already exist');
         }
      } 
   }
   private function validateDescription(){
      $val = trim($this->data['desc']);
      if(empty($val)){
         $this->addError('desc','Description cannot be empty');
      }  
   }

   private function addError($key,$val){
      $this->errors[$key] = $val;
   }
}