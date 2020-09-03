<?php
include_once './layouts/__header.php';
$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
$deptID = $_GET['deptid'];
$deptView = new DepartmentsView();
$dept = $deptView->FetchDeptByID($deptID)[0];
$deptType = $dept['dept_type'];
?>
<main class='professors module'>
  <div class="module__Header">
    <div class='module__Actions'>
      <a href='<?php echo "./department.php?dept=$deptType&page=1" ?>'><img src='./drawables/icons/return.svg' /><span>Back</span></a>
    </div>
    <div class="module__Logo">
      <img src=" drawables/icons/professor.svg">
      <a href='?#'><span>Checklists<?php echo $subTitle ?></span></a>
    </div>
    <div class="module__Links">
      <?php

      $func->GenerateModuleLinks($page, $deptID, true);

      ?>
    </div>
  </div>
  <div class='module__Content'>
    <?php

    if (empty($searchValue)) {
      $checklistView = new ChecklistView();
      $results = $checklistView->FetchChecklist($deptID, $state);

      $isArchived = isset($_GET['archive']);
      $table = $func->TableProperties('checklist', $results, $isArchived, $deptID);
      $paginatedResults = $checklistView->FetchChecklist($deptID, $state, $page, $table['limit']);
      $checklistView->DisplayChecklist($paginatedResults, $page, $table['totalpages'], $table['destination']);
    }
    ?>
  </div>
  <?php


  ?>

</main>

<?php
include_once './layouts/__footer.php';
?>