<?php
include_once './layouts/__header.php';

$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
$searchValue = $_GET['q'] ?? '';
?>

<main class='subjects module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchSubj" placeholder="Search..." value='<?php echo $searchValue ?>'>
         <input id="liveSearch--Status" type="hidden" name="searchState" value="<?php echo $state ?>">
         <input id="liveSearch--Page" type="hidden" name="searchPage" value="<?php echo $page ?>">
      </form>
      <div class="module__Logo">
         <img src="drawables/icons/subjects.svg" alt="Subjects">
         <a href='?#' class="button">Subjects<?php echo $subTitle ?></a>
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
         $subjView = new SubjectsView();
         $results = $subjView->FetchSubjectsByState($state);

         $isArchived = isset($_GET['archive']);
         $table = $func->TableProperties('subj', $results, $isArchived);
         $paginatedResults = $subjView->FetchSubjectsByState($state, $page, $table['limit']);
         $subjView->DisplaySubjects($paginatedResults, $page, $table['totalpages'], $table['destination']);
      }

      ?>
      <iframe src="./reports.php?subjects" frameborder="0" id='iframe' name='iframe'></iframe>
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