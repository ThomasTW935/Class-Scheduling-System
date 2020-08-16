<?php
include_once './layouts/__header.php';

$department = $_GET['dept'];
$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
$searchValue = $_GET['q'] ?? '';
?>

<main class='departments module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchDept<?php echo $department ?>" placeholder="Search..." value='<?php echo $searchValue ?>'>
         <input id="liveSearch--Status" type="hidden" name="searchState" value="<?php echo $state ?>">
         <input id="liveSearch--Page" type="hidden" name="searchPage" value="<?php echo $page ?>">
      </form>
      <div class="module__Logo">
         <img src="drawables/icons/<?php echo $department ?>.svg" alt="<?php echo $department ?>">
         <a href='?dept=<?php echo $department ?>' class="button"><?php echo $department . $subTitle ?></a>
      </div>
      <div class="module__Links">
         <?php

         if (!isset($_GET['archive'])) {
            echo "   <a href='?dept=" . $department . "&page=$page&add'><img src='drawables/icons/add.svg' alter='Add' />
            <span>Add</span>
            </a>";
            echo "<a href='?dept=" . $department . "&archive&page=1'><img src='drawables/icons/archive.svg' alter='Archive' />
            <span>Archive</span>
            </a>";
         } else {
            echo "<a class= 'module__Return' href='?dept=" . $department . "&page=1'><img src='drawables/icons/return.svg'/>BACK</a>";
         }

         ?>
      </div>
   </div>
   <div class='module__Content'>
      <?php

      if (empty($searchValue)) {
         $deptView = new DepartmentsView();
         $results = $deptView->FetchDepts($department, $state);

         $isArchived = isset($_GET['archive']);
         $table = $func->TableProperties($department, $results, $isArchived);

         $paginatedResults = $deptView->FetchDepts($department, $state, $page, $table['limit']);
         $deptView->DisplayDepts($paginatedResults, $page, $table['totalpages'], $table['destination']);
      }

      ?>
   </div>
   <?php
   if (isset($_GET['add']) || isset($_GET['id'])) {
      include_once './layouts/departments.form.php';
   }
   ?>

</main>

<?php
include_once './layouts/__footer.php';
?>