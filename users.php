<?php
include_once './layouts/__header.php';
$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
?>

<main class='users module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchUsers" placeholder="Search...">
         <input id="liveSearch--Status" type="hidden" name="status" value="<?php echo $state ?>">
      </form>
      <div class="module__Logo">
         <img src=" drawables/icons/student.svg">
         <a href='?#' class="button">Users<?php echo $subTitle ?></a>
      </div>
      <div class="module__Links">
         <?php

         if (!isset($_GET['archive'])) {
            echo "   <a href='?page=$page&add'><img src='drawables/icons/add.svg' alter='Add' />
            <span>Add</span>
            </a>";
            echo "<a href='?archive&page=1'><img src='drawables/icons/archive.svg' alter='Archive' />
            <span>Archive</span>
            </a>";
         } else {
            echo "<a class= 'module__Return' href='?page=1'><img src='drawables/icons/return.svg'/>BACK</a>";
         }

         ?>
      </div>
   </div>
   <div class='professors__Container module__Container'>
      <?php

      $usersView = new UsersView();
      $results = $usersView->FetchUsersByState($state);
      $limit = 11;
      $pages = ceil(sizeof($results) / $limit);

      $paginatedResults = $usersView->FetchUsersByState($state, $page, $limit);
      $usersView->DisplayUsers($paginatedResults, $page);

      ?>
   </div>
   <div class='module__Pages'>
      <?php

      include_once './includes/functions.inc.php';

      $destination = (!isset($_GET['archive'])) ? "?page=" : "?archive&page=";

      BuildPagination($page, $pages, $destination);

      ?>
   </div>
   <?php
   if (isset($_GET['add']) || isset($_GET['id'])) {
      include_once './layouts/users.form.php';
   }
   ?>

</main>

<?php
include_once './layouts/__footer.php';
?>