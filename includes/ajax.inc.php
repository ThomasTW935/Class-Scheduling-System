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
