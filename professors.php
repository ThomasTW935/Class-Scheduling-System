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

      $deptID = $_SESSION['department'];
      $isProgramHead = $_SESSION['type'] == 'Program Head';
      if (empty($searchValue)) {
         $profView = new ProfessorsView();
         if (!$isProgramHead) {
            $results = $profView->FetchProfessorsByState($schoolYearID, $state);
         } else {
            $results = $profView->FetchProfessorsByState($schoolYearID, $state, $deptID);
         }

         $isArchived = isset($_GET['archive']);
         $table = $func->TableProperties('prof', $results, $isArchived);
         if (!$isProgramHead) {
            $paginatedResults = $profView->FetchProfessorsByState($schoolYearID, $state, 0, $page, $table['limit']);
         } else {
            $paginatedResults = $profView->FetchProfessorsByState($schoolYearID, $state, $deptID, $page, $table['limit']);
         }
         $profView->DisplayProfessors($paginatedResults, $page, $table['totalpages'], $table['destination']);
      }
      echo "<iframe src='./reports.php?professors&dept=$deptID&programhead=$isProgramHead' frameborder='0' id='iframe' name='iframe'></iframe>"
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