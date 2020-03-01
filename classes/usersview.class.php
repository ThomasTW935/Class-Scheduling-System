<?php

class UsersView extends Users{
   public function DisplayUsers(){
      $results = $this->getUsers();
      return $results;
   }
}