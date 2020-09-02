<?php
include_once './layouts/__header.php';
$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
$searchValue = $_GET['q'] ?? '';
$deptID = $_GET['deptid'];
?>
<main class='professors module'>
  <div class="module__Header">
    <div></div>
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