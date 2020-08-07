<?php

include 'autoloader.inc.php';

$value = '';
$state = $_GET['state'];
$page = $_GET['page'];
if (isset($_GET['searchProf'])) {
   $profView = new ProfessorsView();
   $value = $_GET['searchProf'];

   $results = $profView->FetchProfessorsBySearch($value, $state);
   $limit = 6;
   $pages = ceil(sizeof($results) / $limit);
   $paginatedResults = $profView->FetchProfessorsBySearch($value, $state, $page, $limit);
   $profView->DisplayProfessors($paginatedResults, $page);

   echo "<div class='module__Pages'>";
   include_once './functions.inc.php';
   $destination = ($state == 1) ? "?q=$value&page=" : "?archive&q=$value&page=";
   BuildPagination($page, $pages, $destination);
   echo "</div>";
}
if (isset($_GET['searchRooms'])) {
   $value = $_GET['searchRooms'];
   $roomsView = new RoomsView();
   $results = $roomsView->FetchRoomsBySearch($value, $state);
   $limit = 11;
   $pages = ceil(sizeof($results) / $limit);
   $paginatedResults = $roomsView->FetchRoomsBySearch($value, $state, $page, $limit);
   $roomsView->DisplayRooms($paginatedResults, $page);

   echo "<div class='module__Pages'>";

   include_once './functions.inc.php';
   $destination = ($state == 1) ? "?q=$value&page=" : "?archive&q=$value&page=";
   BuildPagination($page, $pages, $destination);

   echo "</div>";
}
if (isset($_GET['searchUsers'])) {
   $value = $_GET['searchUsers'];
   $usersView = new UsersView();

   $results = $usersView->FetchUsersBySearch($value, $state);
   $limit = 11;
   $pages = ceil(sizeof($results) / $limit);
   $paginatedResults = $usersView->FetchUsersBySearch($value, $state, $page, $limit);
   $usersView->DisplayUsers($paginatedResults, $page);

   echo "<div class='module__Pages'>";
   include_once './functions.inc.php';
   $destination = ($state == 1) ? "?q=$value&page=" : "?archive&q=$value&page=";
   BuildPagination($page, $pages, $destination);
   echo "</div>";
}
if (isset($_GET['searchSubj'])) {
   $value = $_GET['searchSubj'];
   $subjView = new SubjectsView();
   $results = $subjView->FetchSubjectsBySearch($value, $state);
   $limit = 11;
   $pages = ceil(sizeof($results) / $limit);
   $paginatedResults = $subjView->FetchSubjectsBySearch($value, $state, $page, $limit);
   $subjView->DisplaySubjects($paginatedResults, $page);

   echo "<div class='module__Pages'>";
   include_once './functions.inc.php';
   $destination = ($state == 1) ? "?q=$value&page=" : "?archive&q=$value&page=";
   BuildPagination($page, $pages, $destination);
   echo "</div>";
}
if (isset($_GET['searchSect'])) {
   $value = $_GET['searchSect'];
   $sectView = new SectionsView();
   $results = $sectView->FetchSectionsBySearch($value, $state);
   $limit = 11;
   $pages = ceil(sizeof($results) / $limit);
   $paginatedResults = $sectView->FetchSectionsBySearch($value, $state, $page, $limit);
   $sectView->DisplaySections($paginatedResults, $page);

   echo "<div class='module__Pages'>";

   include_once './functions.inc.php';

   $destination = ($state == 1) ? "?q=$value&page=" : "?archive&q=$value&page=";

   BuildPagination($page, $pages, $destination);

   echo "</div>";
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
   $limit = 11;
   $pages = ceil(sizeof($results) / $limit);
   $paginatedResults = $deptView->FetchDeptsBySearch($value, $state, $department, $page, $limit);
   $deptView->DisplayDepts($paginatedResults, $page);

   echo "<div class='module__Pages'>";
   include_once './functions.inc.php';
   $destination = ($state == 1) ? "?dept=$department&q=$value&page=" : "?dept=$department&archive&q=$value&page=";
   BuildPagination($page, $pages, $destination);
   echo "</div>";
}
// if (isset($_GET['searchDeptcourse'])) {
//    $results = $deptView->FetchDeptsBySearch($_GET['searchDeptcourse'], $_GET['state'], 'course');
//    $deptView->DisplayDepts($results, 1);
// }
// if (isset($_GET['searchDeptstrand'])) {
//    $results = $deptView->FetchDeptsBySearch($_GET['searchDeptstrand'], $_GET['state'], 'strand');
//    $deptView->DisplayDepts($results, 1);
// }
// if (isset($_GET['loadSearch'])) {
//    $results = $sectView->FetchSectionsBySearch($_GET['loadSearch'], 1);
//    $sectView->DisplayInSchedLoad($results);
// }
