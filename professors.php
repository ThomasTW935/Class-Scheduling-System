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
         <a href='?#'><span>Instructor<?php echo $subTitle ?></span></a>
      </div>
      <div class="module__Links">
         <?php

         $func->GenerateModuleLinks($page);

         ?>
      </div>
   </div>
   <div class='module__Content'>
      <?php

      if (empty($searchValue)) {
         $profView = new ProfessorsView();
         $results = $profView->FetchProfessorsByState($schoolYearID, $state);

         $isArchived = isset($_GET['archive']);
         $table = $func->TableProperties('prof', $results, $isArchived);
         $paginatedResults = $profView->FetchProfessorsByState($schoolYearID, $state, $page, $table['limit']);
         $profView->DisplayProfessors($paginatedResults, $page, $table['totalpages'], $table['destination']);
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