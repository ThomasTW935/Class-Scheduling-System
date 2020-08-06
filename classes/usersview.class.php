<?php

class UsersView extends Users
{
   public function FetchUsersByState($state, $page = 0, $limit = 0)
   {
      $results = $this->getUsersByState($state, $page, $limit);
      return $results;
   }
   public function FetchUsersBySearch($search, $state)
   {
      $results = $this->getUsersBySearch($search, $state);
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
   public function DisplayUsers($results, $page)
   {
      echo "<ul class='module__List module__Title'>
               <li class='module__Item'>Username</li>
               <li class='module__Item'>Email</li>
               <li class='module__Item'>Role Level</li>
               <li class='module__Item'>Actions</li>
            </ul>";
      foreach ($results as $result) {
         $iconName = ($result['is_active'] == 1) ? 'delete' : 'restore';
         echo "<ul class='module__List'>
            <li class='module__Item'>" . $result['username'] . "</li>
            <li class='module__Item'>" . $result['email'] . "</li>
            <li class='module__Item'>" . $result['role_level'] . "</li>
            <li class='module__Item'>
               <div>";
         if ($result['is_active'] == 1) {
            echo "<a href=?page=$page&id=" . $result['user_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
         }
         echo "<form onsubmit='return submitForm(this)' action='./includes/users.inc.php' method='POST'>
                     <input name='page' type='hidden' value='$page'>
                     <input name='userID' type='hidden' value='" . $result['user_id'] . "'>
                     <input id='state' name='state' type='hidden' value='" . $result['is_active'] . "'>
                     <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
                     <span>" . $iconName . "</span>
                  </form>
               </div>
            </li>
         </ul>";
      }
   }
}
