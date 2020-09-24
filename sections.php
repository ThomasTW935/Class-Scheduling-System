<?php
include_once './layouts/__header.php';
$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
$searchValue = $_GET['q'] ?? '';
?>

<main class='sections module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchSect" placeholder="Search..." value='<?php echo $searchValue ?>'>
         <input id="liveSearch--Status" type="hidden" name="searchState" value="<?php echo $state ?>">
         <input id="liveSearch--Page" type="hidden" name="searchPage" value="<?php echo $page ?>">
      </form>
      <div class="module__Logo">
         <img src="drawables/icons/section.svg" alt="Sections">
         <a href='?#' class="button">Sections<?php echo $subTitle ?></a>
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
         $sectView = new SectionsView();
         $results = $sectView->FetchSectionsByState($schoolYearID, $state);
         $isArchived = isset($_GET['archive']);
         $table = $func->TableProperties('sect', $results, $isArchived);
         $paginatedResults = $sectView->FetchSectionsByState($schoolYearID, $state, $page, $table['limit']);
         $sectView->DisplaySections($paginatedResults, $page, $table['totalpages'], $table['destination']);
      }

      ?>
      <iframe src="./reports.php?sections" frameborder="0" id='iframe' name='iframe'></iframe>
   </div>
   <?php
   if (isset($_GET['add']) || isset($_GET['id'])) {
      include_once './layouts/sections.form.php';
   }
   ?>

</main>

<?php
include_once './layouts/__footer.php';
?>