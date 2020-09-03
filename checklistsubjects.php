<?php
include_once './layouts/__header.php';
$searchValue = $_GET['q'] ?? '';
$id = $_GET['id'];
$checklistView = new ChecklistView();
$checkList = $checklistView->FetchChecklistByID($id)[0];
?>
<main class='module' id='checklistSubjects'>
  <div class="module__Header">
    <div></div>
    <div class="module__Logo">
      <h2><?php echo $checkList['dept_desc'] ?></h2>
      <h3><?php echo $checkList['name'] ?> Checklist</h3>
    </div>
    <div class="module__Links">
      <?php

      echo "<a href='?id=$id&add'><img src='drawables/icons/add.svg' alter='Add' />
      <span>Add</span>
      </a>";

      ?>
    </div>
  </div>
  <div class='module__Content'>

    <?php

    $checklistView = new ChecklistView();
    $levels = $checklistView->FetchDistinctLevel($id);

    foreach ($levels as $level) {
      echo "<table class='module__Table'>
        <caption>{$level['description']}</caption>
        <thead>
          <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Units</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>";
      $subjects = $checklistView->FetchChecklistSubjectsByLevel($id, $level['level_id']);
      $totalUnits = 0;
      foreach ($subjects as $subject) {
        $units = number_format($subject['units'], 2);
        $totalUnits += $units;
        $totalUnits = number_format($totalUnits, 2);
        echo "<tr>
            <td>{$subject['subj_code']}</td>
            <td>{$subject['subj_desc']}</td>
            <td>{$units}</td>
            <td>
            <div class='table-actions'>
              <a href='?id=$id&stcid={$subject['id']}'><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>
              <form onsubmit='return submitForm(this)' action='./includes/checklistsubjects.inc.php' method='POST'>
                <input name='chkID' type='hidden' value='$id'>
                <input name='stcID' type='hidden' value='" . $subject['id'] . "'>
                <input type='hidden' name='' value='1' id='state'>
                <button name='delete-subject' type='submit'><img src='drawables/icons/delete.svg' alter='delete'/></button>
                <span>Delete</span>
              </form>
            </div>
            </td>
          </tr>";
      }
      echo "</tbody>
        <tfoot>
          <tr>
          <td></td>
          <td style='text-align: end;'>Total Units: </td>
          <td>$totalUnits</td>
          </tr>
        </tfoot>
      </table>";
    }


    ?>
  </div>
  <?php

  if (isset($_GET['add']) || isset($_GET['stcid'])) {
    include './layouts/checklistsubjects.form.php';
  }

  ?>

</main>

<?php
include_once './layouts/__footer.php';
?>