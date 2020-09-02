<?php
include_once './layouts/__header.php';
$searchValue = $_GET['q'] ?? '';
$id = $_GET['id'];
$checklistView = new ChecklistView();
$checkList = $checklistView->FetchChecklistByID($id)[0];
?>
<main class='professors module'>
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
      echo "<table>
        <caption>{$level['description']}</caption>
        <thead>
          <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Units</th>
          </tr>
        </thead>
        <tbody>";
      $subjects = $checklistView->FetchChecklistSubjectsByLevel($id, $level['level_id']);
      $totalUnits = 0;
      foreach ($subjects as $subject) {
        $totalUnits += $subject['units'];
        echo "<tr>
            <td>{$subject['subj_code']}</td>
            <td>{$subject['subj_desc']}</td>
            <td>{$subject['units']}</td>
          </tr>";
      }
      echo "</tbody>
        <tfooter>
          <tr>
          <td></td>
          <td>Total Units: </td>
          <td>$totalUnits</td>
          </tr>
        </tfooter>
      </table>";
    }


    ?>
  </div>
  <?php

  if (isset($_GET['add'])) {
    include './layouts/checklistsubjects.form.php';
  }

  ?>

</main>

<?php
include_once './layouts/__footer.php';
?>