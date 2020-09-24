<?php

include_once './includes/autoloader.inc.php';
$func = new Functions();
$schoolyearView = new SchoolyearView();
$schoolYear = $schoolyearView->FetchActiveSchoolYear()[0];
$schoolYearID = $schoolYear['id'];
// include './layouts/__header.php';


?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./styles/reset.css" />
  <link rel="stylesheet" href="./styles/reports.css" />
  <script defer src="scripts/schedule.js"></script>
  <title>Reports</title>
</head>

<body id='print-Content'>
  <div class='module__Content'>
    <!-- <button class='schedules__Action' onclick=' PrintContent()'><img src='./drawables/icons/printer.svg' /><span>Print</span></button> -->
    <?php
    $isPrint = true;
    $state = 1;
    $page = 1;
    $total = 1;
    if (isset($_GET['professors'])) {
      $profView = new ProfessorsView();
      $results = $profView->FetchProfessorsByState($schoolYearID, $state);
      $table = $func->TableProperties('prof', $results);
      $profView->DisplayProfessors($results, $page, $total, $table['destination'], $isPrint);
    } else if (isset($_GET['sections'])) {
      $sectView = new SectionsView();
      $results = $sectView->FetchSectionsByState($schoolYearID, $state);
      $table = $func->TableProperties('sect', $results);
      $sectView->DisplaySections($results, $page, $total, $table['destination'], $isPrint);
    } else if (isset($_GET['subjects'])) {
      $subjView = new SubjectsView();
      $results = $subjView->FetchSubjectsByState($state);

      $table = $func->TableProperties('subj', $results);
      $subjView->DisplaySubjects($results, $page, $total, $table['destination'], $isPrint);
    } else if (isset($_GET['rooms'])) {
      $roomsView = new RoomsView();
      $results = $roomsView->FetchRoomsByState($state);

      $table = $func->TableProperties('room', $results);
      $roomsView->DisplayRooms($results, $page, $total, $table['destination'], $isPrint);
    } else if (isset($_GET['department'])) {
      $department = $_GET['department'];
      $deptView = new DepartmentsView();
      $results = $deptView->FetchDepts($department, $state);
      $table = $func->TableProperties($department, $results);

      $deptView->DisplayDepts($results, $page, $total, $table['destination'], $isPrint);
    }
    ?>
  </div>
</body>