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
      echo "<table class='module__Table'>";
      echo "<thead>";
      echo "<tr class=' '>
               <th class=''>Username</th>
               <th class=''>Email</th>
               <th class=''>Role Level</th>
               <th class=''>Actions</th>
            </tr>";
      echo "</thead>";
      echo "<tbody>";
      foreach ($results as $result) {
         $iconName = ($result['is_active'] == 1) ? 'delete' : 'restore';
         echo "<tr class=''>
            <td class=''>" . $result['username'] . "</td>
            <td class=''>" . $result['email'] . "</td>
            <td class=''>" . $result['role_level'] . "</td>
            <td class=''>
               <div class='table-actions'>";
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
            </td>
         </tr>";
      }
      echo "</tbody>";
      echo "</table>";

      $func = new Functions();
      $func->BuildPagination($page, $totalPages, $destination);
   }
}
