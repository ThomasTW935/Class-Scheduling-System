<?php

include 'autoloader.inc.php';

$value = '';
$state = $_GET['state'];
$page = $_GET['page'];

$func = new Functions();

if (isset($_GET['searchProf'])) {
   $profView = new ProfessorsView();
   $value = $_GET['searchProf'];

   $results = $profView->FetchProfessorsBySearch($value, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('prof', $results, !$state, $value);
   $paginatedResults = $profView->FetchProfessorsBySearch($value, $state, $page, $table['limit']);
   $profView->DisplayProfessors($paginatedResults, $page, $table['totalpages'], $table['destination']);
}
if (isset($_GET['searchRooms'])) {
   $value = $_GET['searchRooms'];
   $roomsView = new RoomsView();
   $results = $roomsView->FetchRoomsBySearch($value, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('room', $results, !$state, $value);
   $paginatedResults = $roomsView->FetchRoomsBySearch($value, $state, $page, $table['limit']);
   $roomsView->DisplayRooms($paginatedResults, $page, $table['totalpages'], $table['destination']);
}
if (isset($_GET['searchUsers'])) {
   $value = $_GET['searchUsers'];
   $usersView = new UsersView();

   $results = $usersView->FetchUsersBySearch($value, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('user', $results, !$state, $value);
   $paginatedResults = $usersView->FetchUsersBySearch($value, $state, $page, $table['limit']);
   $usersView->DisplayUsers($paginatedResults, $page, $table['totalpages'], $table['destination']);
}
if (isset($_GET['searchSubj'])) {
   $value = $_GET['searchSubj'];
   $subjView = new SubjectsView();
   $results = $subjView->FetchSubjectsBySearch($value, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('subj', $results, !$state, $value);
   $paginatedResults = $subjView->FetchSubjectsBySearch($value, $state, $page, $table['limit']);
   $subjView->DisplaySubjects($paginatedResults, $page, $table['totalpages'], $table['destination']);
}
if (isset($_GET['searchSect'])) {
   $value = $_GET['searchSect'];
   $sectView = new SectionsView();
   $results = $sectView->FetchSectionsBySearch($value, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('sect', $results, !$state, $value);
   $paginatedResults = $sectView->FetchSectionsBySearch($value, $state, $page, $table['limit']);
   $sectView->DisplaySections($paginatedResults, $page, $table['totalpages'], $table['destination']);
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
