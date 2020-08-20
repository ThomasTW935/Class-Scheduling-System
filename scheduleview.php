<?php
include_once './layouts/__header.php';
?>

<main class="scheduleview module">
  <?php

  $schedView = new SchedulesView();
  $profView = new ProfessorsView();

  var_dump($_SESSION);
  $userID = $sessionID;
  $prof = $profView->FetchProfessorByUserID($userID);
  if (empty($prof)) {
    echo "Schedule Not Applicable";
    exit();
  }
  $profID = $prof[0]['id'];

  $caption = "{$prof['full_name']}";
  $type = 'prof';
  $dTime = $schedView->FetchDisplayTime($type, $profID)[0];
  $startTime = $dTime['op_start'];
  $endTime   = $dTime['op_end'];
  $jumpTime  = $dTime['op_jump'];

  $newStartTime = strtotime($startTime);
  $newEndTime = strtotime($endTime);

  echo "<div class='schedules__Table'>";
  $schedView->DisplaySchedule($caption, $newStartTime, $newEndTime, $jumpTime, $type, $profID);
  echo "</div>";

  ?>

</main>

<?php
include_once './layouts/__footer.php';
?>