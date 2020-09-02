<?php
include_once './layouts/__header.php';
$searchValue = $_GET['q'] ?? '';
$id = $_GET['id'];
$checklistView = new ChecklistView();
$checkList = $checklistView->FetchChecklistByID($id)[0];
var_dump($checkList);
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

    if (empty($searchValue)) {
      $checklistView = new ChecklistView();
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