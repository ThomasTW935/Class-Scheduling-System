<?php
include_once './layouts/__header.php';
$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
$searchValue = $_GET['q'] ?? '';
?>

<main class='sections module'>
  <div class="module__Header">
    <form class="liveSearch__Form">
      <select id='schoolYearSelect' name='schoolYear-Change' onchange="SchoolYearOnChange()">

        <?php
        $schoolyearView = new SchoolyearView();
        $results = $schoolyearView->FetchSchoolyear();
        foreach ($results as $schoolYear) {
          $optSel = ($schoolYear['id'] == $schoolYearID) ? 'selected' : '';
          switch ($schoolYear['term'] % 10) {
            case 1:
              $term = 'st';
              break;
            case 2:
              $term = 'nd';
              break;
            case 3:
              $term = 'rd';
              break;
            default:
              $term = 'th';
              break;
          }
          echo "<option value='{$schoolYear['id']}' $optSel>SY{$schoolYear['year']} {$schoolYear['term']}<sup>$term</sup> Term</option>";
        }

        ?>
      </select>
    </form>
    <div class="module__Logo">
      <img src="drawables/icons/calendar.svg" alt="Settings">
      <a href='?#' class="button">School Year<?php echo $subTitle ?></a>
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

      $isArchived = isset($_GET['archive']);
      $table = $func->TableProperties('schoolyear', $results, $isArchived);
      $paginatedResults = $schoolyearView->FetchSchoolyear($page, $table['limit']);
      $schoolyearView->DisplaySchoolyear($paginatedResults, $page, $table['totalpages'], $table['destination']);
    }

    ?>

  </div>
  <?php
  if (isset($_GET['add']) || isset($_GET['id'])) {
    include_once './layouts/settings.form.php';
  }
  ?>

</main>

<?php
include_once './layouts/__footer.php';
?>