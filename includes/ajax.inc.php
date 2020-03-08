<?php

include 'autoloader.inc.php';


if (isset($_GET['searchProf'])) {
   $profView = new ProfessorsView();
   $results = $profView->FetchProfessorsBySearch($_GET['searchProf'], $_GET['status']);
   $profView->DisplayProfessors($results);
}
if (isset($_GET['searchRooms'])) {
   $roomsView = new RoomsView();
   $results = $roomsView->FetchRoomsBySearch($_GET['searchRooms'], $_GET['status']);
   $roomsView->DisplayRooms($results);
}
if (isset($_GET['searchUsers'])) {
   $usersView = new UsersView();
   $results = $usersView->FetchUsersBySearch($_GET['searchUsers'], $_GET['status']);
   $usersView->DisplayUsers($results);
}
if (isset($_GET['searchDepartments'])) {
   $deptView = new DepartmentsView();
   $results = $deptView->FetchDeptBySearch($_GET['searchDept'], $_GET['status'], $_GET['dept']);
   $deptView->DisplayDept($results);
}
