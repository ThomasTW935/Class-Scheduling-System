<?php

include 'autoloader.inc.php';
session_start();

$func = new Functions();


if (isset($_GET['selectLevel']) || isset($_GET['selectDept'])) {
   // $level = $_GET['selectLevel'] ?? "course";
   // $levels = [];
   // $levels['course'] = "College";
   // $levels['strand'] = "Senior High School";

   // echo "<select class='liveSelect' name='selectLevel' onchange='selectChangeValue()'>";
   // foreach ($levels as $key => $value) {
   //    $selected = ($level == $key) ? "selected" : "";
   //    echo "<option value='$key' $selected>$value</option>";
   // }
   // echo "</select>";
   // echo "<select name='selectDept' onchange='selectChangeValue()'>";
   // $deptView = new DepartmentsView();
   // $depts = $deptView->FetchDepts($level, 1);
   // foreach ($depts as $dept) {
   //    echo "<option value='{$dept['dept_id']}'>{$dept['dept_desc']}</option>";
   // }

   // echo "</select>";

   // $department = $_GET['selectDept'];
   // echo "<select name='selectSection' onchange='selectChangeValue()'>";

   // $sectView = new SectionsView();
   // $sects = $sectView->FetchSectionByDept($department);
   // foreach ($sects as $sect) {
   //    echo "<option value='{$sect['sect_id']}'>{$sect['sect_name']}</option>";
   // }

   // echo "</select>";

   if (isset($_GET['selectLevel'])) {
      $level = $_GET['selectLevel'];
      $deptView = new DepartmentsView();
      $depts = $deptView->FetchDeptsWithSect($level, 1);
      echo json_encode($depts);
      // foreach ($depts as $dept) {
      //    echo "<option value='{$dept['dept_id']}'>{$dept['dept_desc']}</option>";
      // }
   }
   if (isset($_GET['selectDept'])) {
      $department = $_GET['selectDept'];
      $sectView = new SectionsView();
      $sects = $sectView->FetchSectionByDept($department);
      echo json_encode($sects);
      // foreach ($sects as $sect) {
      //    echo "<option value='{$sect['sect_id']}'>{$sect['sect_name']}</option>";
      // }
   }

   exit();
}
if (isset($_GET['selectSection'])) {
   $id = $_GET['selectSection'];

   $sectView = new SectionsView();
   $sect = $sectView->FetchSectionByID($id)[0];
   $caption = "
   <p>{$sect['dept_desc']}</p>
   <p>{$sect['sect_yrsem']}</p>
   <h3>{$sect['sect_name']}</h3>
   ";

   $schedView = new SchedulesView();
   $type = 'sect';
   $dTime = $schedView->FetchDisplayTime($type, $id)[0];

   $startTime = $dTime['op_start'];
   $endTime   = $dTime['op_end'];
   $jumpTime  = $dTime['op_jump'];
   $newStartTime = strtotime($startTime);
   $newEndTime = strtotime($endTime);

   $schedView->DisplaySchedule($caption, $newStartTime, $newEndTime, $jumpTime, $type, $id);
   // $id = $_GET['selectSection'];
   // $func->BuildLiveSelect($id, 'section');

   exit();
}

$value = '';
$state = $_GET['state'];
$page = $_GET['page'];

if (isset($_GET['searchProf'])) {
   $profView = new ProfessorsView();
   $value = $_GET['searchProf'];

   $results = $profView->FetchProfessorsBySearch($value, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('prof', $results, !$state, $value);
   $paginatedResults = $profView->FetchProfessorsBySearch($value, $state, $page, $table['limit']);
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

   $results = $usersView->FetchUsersBySearch($value, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('user', $results, !$state, $value);
   $paginatedResults = $usersView->FetchUsersBySearch($value, $state, $page, $table['limit']);
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
   $results = $sectView->FetchSectionsBySearch($value, $state);

   $isArchived = ($state == 0);
   $table = $func->TableProperties('sect', $results, !$state, $value);
   $paginatedResults = $sectView->FetchSectionsBySearch($value, $state, $page, $table['limit']);
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
