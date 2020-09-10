<?php
include_once './layouts/__header.php';
?>

<main class="scheduleview module">
  <?php

  $schedView = new SchedulesView();
  $profView = new ProfessorsView();

  $userID = $sessionID;
  $prof = $profView->FetchProfessorByUserID($userID)[0];
  $profID = $prof['id'];

  $caption =   $profView->GenerateFullName($prof['last_name'], $prof['first_name'], $prof['middle_initial'], $prof['suffix']);
  $type = 'prof';


  $newStartTime = strtotime($schoolYear['operation_start']);
  $newEndTime = strtotime($schoolYear['operation_end']);

  echo "<div class='schedules__Table'>";
  $schedView->DisplaySchedule($caption, $newStartTime, $newEndTime, 30, $type, $profID, $schoolYearID);
  echo "</div>";

  ?>

</main>

<?php
include_once './layouts/__footer.php';
?>