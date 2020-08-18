<?php
include_once './layouts/__header.php';
?>

<main class="scheduleview">
  <?php

  var_dump($sessionID);
  $schedView = new SchedulesView();
  $profView = new ProfessorsView();

  $id = $profView->FetchProfessorByUserID($sessionID);


  ?>

</main>

<?php
include_once './layouts/__footer.php';
?>