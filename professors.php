<?php
include_once './layouts/__header.php';
$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
$searchValue = $_GET['q'] ?? '';
?>
<main class='professors module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchProf" placeholder="Search..." value='<?php echo $searchValue ?>'>
         <input id="liveSearch--Status" type="hidden" name="searchState" value="<?php echo $state ?>">
         <input id="liveSearch--Page" type="hidden" name="searchPage" value="<?php echo $page ?>">
      </form>
      <div class="module__Logo">
         <img src=" drawables/icons/professor.svg">
         <a href='?#'><span>Professors<?php echo $subTitle ?></span></a>
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

      if (empty($searchValue)) {
         $profView = new ProfessorsView();
         $results = $profView->FetchProfessorsByState($state);
         $limit = 6;
         $pages = ceil(sizeof($results) / $limit);

         $paginatedResults = $profView->FetchProfessorsByState($state, $page, $limit);
         $profView->DisplayProfessors($paginatedResults, $page);

         echo "<div class='module__Pages'>";

         include_once './includes/functions.inc.php';
         $destination = (!isset($_GET['archive'])) ? "?page=" : "?archive&page=";
         BuildPagination($page, $pages, $destination);

         echo "</div>";
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