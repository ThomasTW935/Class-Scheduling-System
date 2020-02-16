<?php

class ProfessorsVal{
   private $data;
   private $errors = [];
   private static $fields = ['employeeID','lastName','firstName','middleInitial','suffix','deptID'];
   public function __construct($post_data)
   {
      $this->data = $post_data;
   }
   public function validateForm(){
      foreach(self::$fields as $field){
         if(!array_key_exists($field, $this->data)){
            trigger_error("$field is not presend in data");
            return;
         }
      }

      $this->validateID();
      $this->validateFirstName();
      $this->validateLastName();
      $this->validateMiddleInitial();
      $this->validateSuffix();

      return $this->errors;
   }
   private function validateID(){

      $val = trim($this->data['employeeID']);
      if(empty($val)){
         $this->addError('employeeID','Employee ID cannot be empty');
      }
      else if(!preg_match('/^[0-9]{8,}$/', $val)){
         $this->addError('employeeID', 'Employee ID must only be numbers and at least 8 numbers');
      }
      else{
         $prof = new ProfessorsView();
         $result = $prof->CheckProfessor($val);
         if(!empty($result)){
            $this->addError('employeeID', 'Employee already exist');
         }
      } 
      

   }
   private function validateFirstName(){

      $val = trim($this->data['firstName']);
      if(empty($val)){
         $this->addError('firstName','First name cannot be empty');
      } else {
         if(!preg_match('/^[a-zA-Z ]*$/', $val)){
            $this->addError('firstName', 'First name must only contain letters');
         }
      }
      
   }

   private function validateLastName(){

      $val = trim($this->data['lastName']);
      if(empty($val)){
         $this->addError('lastName','Last name cannot be empty');
      } else {
         if(!preg_match('/^[a-zA-Z ]*$/', $val)){
            echo $val . '</br>';
            $this->addError('lastName', 'Last name must only contain letters');
         }
      }

   }
   
   private function validateMiddleInitial(){

      $val = trim($this->data['middleInitial']);
         if(!preg_match('/^[a-zA-Z ]{0,2}$/', $val)){
            $this->addError('middleInitial', 'Last name must only contain letters and have 1-2 characters');
         }

   }

   private function validateSuffix(){

      $val = trim($this->data['suffix']);
         if(!preg_match('/^[a-zA-Z ]{0,3}$/', $val)){
            $this->addError('suffix', 'Suffix must only contain letters and have 1-3 characters');
         }

   }

   private function addError($key,$val){
      $this->errors[$key] = $val;
   }
}