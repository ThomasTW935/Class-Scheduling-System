<?php

include 'autoloader.inc.php';


if (isset($_GET['searchProf'])) {
   $profView = new ProfessorsView();
   $results = $profView->FetchProfessorsBySearch($_GET['searchProf'], $_GET['state']);
   $profView->DisplayProfessors($results);
}
if (isset($_GET['searchRooms'])) {
   $roomsView = new RoomsView();
   $results = $roomsView->FetchRoomsBySearch($_GET['searchRooms'], $_GET['state']);
   $roomsView->DisplayRooms($results);
}
if (isset($_GET['searchUsers'])) {
   $usersView = new UsersView();
   $results = $usersView->FetchUsersBySearch($_GET['searchUsers'], $_GET['state']);
   $usersView->DisplayUsers($results);
}
if (isset($_GET['searchSubj'])) {
   $subjView = new SubjectsView();
   $results = $subjView->FetchSubjectsBySearch($_GET['searchSubj'], $_GET['state']);
   $subjView->DisplaySubjects($results);
}
if (isset($_GET['searchSect'])) {
   $sectView = new SectionsView();
   $results = $sectView->FetchSubjectsBySearch($_GET['searchSect'], $_GET['state']);
   $sectView->DisplaySubjects($results);
}
$deptView = new DepartmentsView();
if (isset($_GET['searchDeptfaculty'])) {
   $results = $deptView->FetchDeptsBySearch($_GET['searchDeptfaculty'], $_GET['state'], 'faculty');
   $deptView->DisplayDepts($results);
}
if (isset($_GET['searchDeptcourse'])) {
   $results = $deptView->FetchDeptsBySearch($_GET['searchDeptcourse'], $_GET['state'], 'course');
   $deptView->DisplayDepts($results);
}
if (isset($_GET['searchDeptstrand'])) {
   $results = $deptView->FetchDeptsBySearch($_GET['searchDeptstrand'], $_GET['state'], 'strand');
   $deptView->DisplayDepts($results);
}
