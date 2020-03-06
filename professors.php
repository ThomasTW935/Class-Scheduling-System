<?php
include_once './layouts/__header.php';
$state = isset($_GET['archive']) ? 0 : 1;
?>

<main class='professors module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchProf" placeholder="Search...">
         <input id="liveSearch--Status" type="hidden" name="status" value="<?php echo $state ?>">
      </form>
      <div class="module__Logo">
         <img src=" drawables/icons/professor.svg">
         <a href='?#' class="button">Professors</a>
      </div>
      <div class="module__Links">
         <a href='?add' class='module__Add button'>ADD</a>
         <a href='?archive' class='module__Archive button'>Archive</a>
      </div>
   </div>
   <div class='professors__Container module__Container'>
      <?php

      $profView = new ProfessorsView();
      $results = $profView->FetchProfessorsByState($state);
      $profView->DisplayProfessors($results);

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