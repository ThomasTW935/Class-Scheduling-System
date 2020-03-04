<?php
include_once './layouts/__header.php';
?>

<main class='users module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="userSearch" placeholder="Search...">
      </form>
      <img src="drawables/icons/professor.svg">
      <a href='?add' class='module__Add button'>ADD</a>
   </div>
   <div class='professors__Container module__Container'>
      <ul class='module__List module__Title'>
         <li class='module__Item'>Username</li>
         <li class='module__Item'>Email</li>
         <li class='module__Item'>Role Level</li>
         <li class='module__Item'>Actions</li>
      </ul>
      <?php
      $usersView = new UsersView();
      $results = $usersView->DisplayUsers();
      foreach ($results as $result) {
         echo "<ul class='module__List'>
                     <li class='module__Item'>" . $result['username'] . "</li>
                     <li class='module__Item'>" . $result['email'] . "</li>
                     <li class='module__Item'>" . $result['role_level'] . "</li>
                     <li class='module__Item'>
                        <div>
                           <a href=?id=" . $result['user_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>
                           <form onsubmit='return submitForm(this)' action='./includes/users.inc.php' method='POST'>
                              <input name='id' type='hidden' value='" . $result['user_id'] . "'>
                              <button name='delete' type='submit'><img src='drawables/icons/delete.svg' alter='Delete'/></button>
                              <span>Delete</span>
                           </form>
                        </div>
                     </li>
                  </ul>";
      }

      ?>
   </div>
   <?php
   if (isset($_GET['add']) || isset($_GET['id'])) {
      include_once './layouts/professors.form.php';
   }
   ?>

</main>

<?php
include_once './layouts/__footer.php';
?>