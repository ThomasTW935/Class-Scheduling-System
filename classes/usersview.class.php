<?php

class UsersView extends Users
{
   public function FetchUsersByState($state)
   {
      $results = $this->getUsersByState($state);
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
   public function DisplayUsers($results)
   {
      echo "<ul class='module__List module__Title'>
               <li class='module__Item'>Username</li>
               <li class='module__Item'>Email</li>
               <li class='module__Item'>Role Level</li>
               <li class='module__Item'>Actions</li>
            </ul>";
      foreach ($results as $result) {
         $iconName = ($result['is_active'] == 1) ? 'delete' : 'recover';
         echo "<ul class='module__List'>
            <li class='module__Item'>" . $result['username'] . "</li>
            <li class='module__Item'>" . $result['email'] . "</li>
            <li class='module__Item'>" . $result['role_level'] . "</li>
            <li class='module__Item'>
               <div>
                     <a href=?id=" . $result['user_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>
                     <form onsubmit='return submitForm(this)' action='./includes/users.inc.php' method='POST'>
                        <input name='id' type='hidden' value='" . $result['user_id'] . "'>
                        <input name='status' type='hidden' value='" . $result['is_active'] . "'>
                        <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
                        <span>" . $iconName . "</span>
                     </form>
               </div>
            </li>
         </ul>";
      }
   }
}
