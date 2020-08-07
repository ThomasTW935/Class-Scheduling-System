<?php
include_once './layouts/__header.php';

$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
?>

<main class='subjects module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchSubj" placeholder="Search...">
         <input id="liveSearch--Status" type="hidden" name="searchState" value="<?php echo $state ?>">
      </form>
      <div class="module__Logo">
         <img src="drawables/icons/subjects.svg" alt="Subjects">
         <a href='?#' class="button">Subjects<?php echo $subTitle ?></a>
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
   <div class='module__Container'>
      <?php

      $subjView = new SubjectsView();
      $results = $subjView->FetchSubjectsByState($state);
      $limit = 11;
      $pages = ceil(sizeof($results) / $limit);

      $paginatedResults = $subjView->FetchSubjectsByState($state, $page, $limit);
      $subjView->DisplaySubjects($paginatedResults, $page);

      ?>
   </div>
   <div class='module__Pages'>
      <?php

      include_once './includes/functions.inc.php';

      $destination = (!isset($_GET['archive'])) ? "?page=" : "?archive&page=";

      BuildPagination($page, $pages, $destination);

      // if ($pages > 1) {
      //    $previous = $page - 1;
      //    $checkPrevious = ($page > 1) ? "" : " class='disabled'";
      //    echo "<a href='?page=$previous' $checkPrevious>Previous</a>";
      // }
      // if ($pages <= 10) {

      //    for ($i = 1; $i <= $pages; $i++) {
      //       $activePage = ($page != $i) ? "href='?page=$i'" : "class='active'";
      //       echo "<a $activePage>$i</a>";
      //    }
      // } else if ($pages > 10) {
      //    $secondLast = $pages - 1;

      //    if ($page <= 4) {
      //       for ($i = 1; $i < 8; $i++) {
      //          $activePage = ($page != $i) ? "href='?page=$i'" : "class='active'";
      //          echo "<a $activePage>$i</a>";
      //       }
      //       echo "<a>...</a>";
      //       echo "<a href='?page=$secondLast'>$secondLast</a>";
      //       echo "<a href='?page=$pages'>$pages</a>";
      //    } else if ($page > 4 && $page < $pages - 4) {
      //       echo "<a href='?page=1'>1</a>";
      //       echo "<a href='?page=2'>2</a>";
      //       echo "<a>...</a>";
      //       for ($i = $page - 2; $i <= $page + 2; $i++) {
      //          $activePage = ($page != $i) ? "href='?page=$i'" : "class='active'";
      //          echo "<a $activePage>$i</a>";
      //       }
      //       echo "<a>...</a>";
      //       echo "<a href='?page=$secondLast'>$secondLast</a>";
      //       echo "<a href='?page=$pages'>$pages</a>";
      //    } else {
      //       echo "<a href='?page=1'>1</a>";
      //       echo "<a href='?page=2'>2</a>";
      //       echo "<a>...</a>";
      //       for ($i = $pages - 6; $i <= $pages; $i++) {
      //          $activePage = ($page != $i) ? "href='?page=$i'" : "class='active'";
      //          echo "<a $activePage>$i</a>";
      //       }
      //    }
      // }
      // if ($pages > 1) {
      //    $next = $page + 1;
      //    $checkNext = ($page < $pages) ? "" : " class='disabled'";
      //    echo "<a href='?page=$next' $checkNext>Next</a>";
      // }

      ?>
   </div>
   <?php
   if (isset($_GET['add']) || isset($_GET['id'])) {
      include_once './layouts/subjects.form.php';
   }
   ?>

</main>

<?php
include_once './layouts/__footer.php';
?>