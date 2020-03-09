<?php
include_once './layouts/__header.php';

$department = $_GET['dept'];
$state = isset($_GET['archive']) ? 0 : 1;
?>

<main class='departments module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchDept<?php echo $department ?>" placeholder="Search...">
         <input id="liveSearch--Status" type="hidden" name="searchState" value="<?php echo $state ?>">
      </form>
      <div class="module__Logo">
         <img src="drawables/icons/faculty.svg" alt="faculty">
         <a href='?dept=<?php echo $department ?>' class="button"><?php echo $department ?></a>
      </div>
      <div class="module__Links">
         <?php

         if (!isset($_GET['archive'])) {
            echo "   <a href='?dept=" . $department . "&add'><img src='drawables/icons/add.svg' alter='Add' />
            <span>Add</span>
            </a>";
            echo "<a href='?dept=" . $department . "&archive'><img src='drawables/icons/archive.svg' alter='Archive' />
            <span>Archive</span>
            </a>";
         } else {
            echo "<a class= 'module__Return' href='?dept=" . $department . "'><img src='drawables/icons/return.svg'/>BACK</a>";
         }

         ?>
      </div>
   </div>
   <div class='module__Container'>
      <?php


      $deptView = new DepartmentsView();
      $results = $deptView->FetchDepts($department, $state);
      $deptView->DisplayDepts($results);
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