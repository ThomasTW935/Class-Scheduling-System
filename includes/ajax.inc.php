<?php

include 'autoloader.inc.php';
session_start();

$func = new Functions();
$schoolyearView = new SchoolyearView();
$schoolYear = $schoolyearView->FetchActiveSchoolYear()[0];
$schoolYearID = $schoolYear['id'];

if (isset($_GET['deptID'])) {
   $deptView = new DepartmentsView();
   $deptID = $_GET['deptID'];
   $checklistView = new ChecklistView();
   $checklists = $checklistView->FetchChecklist($deptID, 1);
   echo json_encode($checklists);
   exit();
}
if (isset($_GET['chkID'])) {
   $chkID = $_GET['chkID'];
   $checklistView = new ChecklistView();
   $levels = $checklistView->FetchDistinctLevel($chkID);
   echo json_encode($levels);
   exit();
}

if (isset($_GET['selectLevel']) || isset($_GET['selectDept'])) {

   if (isset($_GET['selectLevel'])) {
      $level = $_GET['selectLevel'];
      $deptView = new DepartmentsView();
      $depts = $deptView->FetchDeptsWithSect($level, 1, $schoolYearID);
      echo json_encode($depts);
   }
   if (isset($_GET['selectDept'])) {
      $department = $_GET['selectDept'];
      $sectView = new SectionsView();
      $sects = $sectView->FetchSectionByDept($department, $schoolYearID);
      echo json_encode($sects);
   }

   exit();
}
if (isset($_GET['selectSection'])) {
   $id = $_GET['selectSection'];

   $sectView = new SectionsView();
   $sect = $sectView->FetchSectionByID($id)[0];
   $caption = "
   <p>{$sect['dept_desc']}</p>
   <p>{$sect['sect_year']}</p>
   <h3>{$sect['sect_name']}</h3>
   ";



   $startTime = $schoolYear['operation_start'];
   $endTime   = $schoolYear['operation_end'];
   $jumpTime  = 30;
   $type = 'sect';
   $newStartTime = strtotime($startTime);
   $newEndTime = strtotime($endTime);

   $schedView = new SchedulesView();
   $schedView->DisplaySchedule($caption, $newStartTime, $newEndTime, $jumpTime, $type, $id, $schoolYearID);
   exit();
}

if (isset($_GET['schoolYear-Change'])) {
   $id = $_GET['schoolYear-Change'];
   $schoolyearContr = new SchoolyearContr();
   $schoolyearContr->ModifySchoolYearActive($id);
   exit();
}

$value = '';
$state = $_GET['state'];
$page = $_GET['page'];

if (isset($_GET['searchProf'])) {
   $profView = new ProfessorsView();
   $value = $_GET['searchProf'];

   $results = $profView->FetchProfessorsBySearch($value, $schoolYearID, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('prof', $results, !$state, $value);
   $paginatedResults = $profView->FetchProfessorsBySearch($value, $schoolYearID, $state, $page, $table['limit']);
   $profView->DisplayProfessors($paginatedResults, $page, $table['totalpages'], $table['destination']);
   exit();
}
if (isset($_GET['searchRooms'])) {
   $value = $_GET['searchRooms'];
   $roomsView = new RoomsView();
   $results = $roomsView->FetchRoomsBySearch($value, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('room', $results, !$state, $value);
   $paginatedResults = $roomsView->FetchRoomsBySearch($value, $state, $page, $table['limit']);
   $roomsView->DisplayRooms($paginatedResults, $page, $table['totalpages'], $table['destination']);
   exit();
}
if (isset($_GET['searchUsers'])) {
   $value = $_GET['searchUsers'];
   $usersView = new UsersView();

   $results = $usersView->FetchUsersBySearch($value, $schoolYearID, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('user', $results, !$state, $value);
   $paginatedResults = $usersView->FetchUsersBySearch($value, $schoolYearID, $state, $page, $table['limit']);
   $usersView->DisplayUsers($paginatedResults, $page, $table['totalpages'], $table['destination']);
   exit();
}
if (isset($_GET['searchSubj'])) {
   $value = $_GET['searchSubj'];
   $subjView = new SubjectsView();
   $results = $subjView->FetchSubjectsBySearch($value, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('subj', $results, !$state, $value);
   $paginatedResults = $subjView->FetchSubjectsBySearch($value, $state, $page, $table['limit']);
   $subjView->DisplaySubjects($paginatedResults, $page, $table['totalpages'], $table['destination']);
   exit();
}

if (isset($_GET['searchSect'])) {
   $value = $_GET['searchSect'];
   $sectView = new SectionsView();
   $results = $sectView->FetchSectionsBySearch($value, $schoolYearID, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('sect', $results, !$state, $value);
   $paginatedResults = $sectView->FetchSectionsBySearch($value, $schoolYearID, $state, $page, $table['limit']);
   $sectView->DisplaySections($paginatedResults, $page, $table['totalpages'], $table['destination']);
   exit();
}
if (isset($_GET['searchDeptfaculty']) || isset($_GET['searchDeptcourse']) || isset($_GET['searchDeptstrand'])) {
   $deptView = new DepartmentsView();
   if (isset($_GET['searchDeptfaculty'])) {
      $department = 'faculty';
      $value = $_GET['searchDeptfaculty'];
   } else if (isset($_GET['searchDeptcourse'])) {
      $value = $_GET['searchDeptcourse'];
      $department = 'course';
   } else {
      $value = $_GET['searchDeptstrand'];
      $department = 'strand';
   }
   $results = $deptView->FetchDeptsBySearch($value, $state, $department);

   $table = $func->TableProperties($department, $results, !$state, $value);
   $paginatedResults = $deptView->FetchDeptsBySearch($value, $state, $department, $page, $table['limit']);
   $deptView->DisplayDepts($paginatedResults, $page, $table['totalpages'], $table['destination']);
}
