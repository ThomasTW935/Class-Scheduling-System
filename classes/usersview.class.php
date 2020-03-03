<?php

class UsersView extends Users
{
   public function DisplayUsers()
   {
      $results = $this->getUsers();
      return $results;
   }
   public function FetchUserByUsername($username)
   {
      $result = $this->getUserByUsername($username);
      return $result;
   }
}
