<?php
include_once './layouts/__header.php';
$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
$searchValue = $_GET['q'] ?? '';
?>

<main class='users module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchUsers" placeholder="Search..." value='<?php echo $searchValue ?>'>
         <input id="liveSearch--Status" type="hidden" name="searchState" value="<?php echo $state ?>">
         <input id="liveSearch--Page" type="hidden" name="searchPage" value="<?php echo $page ?>">
      </form>
      <div class="module__Logo">
         <img src=" drawables/icons/student.svg">
         <a href='?#' class="button">Users<?php echo $subTitle ?></a>
      </div>
      <div class="module__Links">
         <?php

         $func->GenerateModuleLinks($page, '', false, true);

         ?>
      </div>
   </div>
   <div class='module__Content'>
      <?php

      if (empty($searchValue)) {
         $usersView = new UsersView();
         $results = $usersView->FetchUsersByState($schoolYearID, $state);

         $isArchived = isset($_GET['archive']);
         $table = $func->TableProperties('user', $results, $isArchived);

         $paginatedResults = $usersView->FetchUsersByState($schoolYearID, $state, $page, $table['limit']);
         $usersView->DisplayUsers($paginatedResults, $page, $table['totalpages'], $table['destination']);
      }

      ?>
   </div>
   <?php
   if (isset($_GET['id'])) {
      include_once './layouts/users.form.php';
   }
   ?>

</main>

<?php
include_once './layouts/__footer.php';
?>