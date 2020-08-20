<?php

class UsersView extends Users
{
   public function FetchUsersByState($state, $page = 0, $limit = 0)
   {
      $results = $this->getUsersByState($state, $page, $limit);
      return $results;
   }
   public function FetchUsersBySearch($search, $state, $page = 0, $limit = 0)
   {
      $results = $this->getUsersBySearch($search, $state, $page, $limit);
      return $results;
   }
   public function FetchUserByUsername($username)
   {
      $result = $this->getUserByUsername($username);
      return $result;
   }
   public function FetchUserByID($id)
   {
      $result = $this->getUserByID($id);
      return $result;
   }
   public function DisplayUsers($results, $page, $totalPages, $destination)
   {
      $func = new Functions();
      $func->TableTemplate("user", $results, $page);
      $func->BuildPagination($page, $totalPages, $destination);
   }
}
