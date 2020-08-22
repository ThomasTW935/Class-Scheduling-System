<?php
include_once './layouts/__header.php';
?>

<main class="scheduleview module">
  <?php

  $schedView = new SchedulesView();
  $profView = new ProfessorsView();

  $userID = $sessionID;
  $prof = $profView->FetchProfessorByUserID($userID);
  if (empty($prof)) {
    echo "Schedule Not Applicable";
    exit();
  }
  $prof = $prof[0];
  $profID = $prof['id'];

  $caption =   $profView->GenerateFullName($prof['last_name'], $prof['first_name'], $prof['middle_initial'], $prof['suffix']);
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