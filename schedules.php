<?php
include_once './layouts/__header.php';


$deptView = new DepartmentsView();
$sectView = new SectionsView();
$roomView = new RoomsView();
$profView = new ProfessorsView();
$subjView = new SubjectsView();
$schedView = new SchedulesView();
$checklistView = new ChecklistView();
$type = $_POST['type'] ?? $_GET['type'];
$ID = $_POST['id'] ?? $_GET['id'];
if (!isset($type) xor empty($type)) {
   header('Location: ./dashboard.php');
   exit();
}
$startTime = strtotime($schoolYear['operation_start']);
$endTime   = strtotime($schoolYear['operation_end']);
$jumpTime  = 30;

$sideBarText = '';
$returnDestination = '';

if ($type == 'sect' || empty($type) || $type == null) {
   $sectID = $ID;
   $sect = $sectView->FetchSectionByID($sectID)[0];
   $dept = $deptView->FetchDeptByID($sect['dept_id'])[0];
   $sideBarText .= "<h2>" . $sect['sect_name'] . "</h2>";
   $sideBarText .= "<h3>{$sect['sect_year']}</h3>";
   $sideBarText .= "<h4>" . $sect['dept_desc'] . "</h4>";
   $caption = "
   <p>{$sect['dept_desc']}</p>
   <p>{$sect['sect_year']}</p>
   <h3>{$sect['sect_name']}</h3>
   ";
   $returnDestination = 'sections';
} else if ($type == 'room') {
   $roomID = $ID;
   $room = $roomView->FetchRoomByID($roomID)[0];
   $sideBarText .= "<h2>" . $room['rm_name'] . "</h2>";
   $sideBarText .= "<h3>" . $room['rm_desc'] . "</h3>";
   $sideBarText .= "<h4>{$room['rm_floor']}</h4>";
   $caption = "Rm.{$room['rm_name']}";
   $returnDestination = 'rooms';
} else if ($type == 'prof') {
   $profID = $ID;
   $prof = $profView->FetchProfessorByID($profID)[0];
   $dept = $deptView->FetchDeptByID($prof['dept_id'])[0];
   $imgSrc = $prof['prof_img'];
   if (empty($prof['prof_img']))
      $imgSrc = "professor.png";
   $middleInitial = (!empty($prof['middle_initial'])) ? $prof['middle_initial'] . '.' : '';
   $fullName = "{$prof['last_name']}, {$prof['first_name']} {$middleInitial} {$prof['suffix']}";
   $sideBarText .= "<img src='./drawables/images/" . $imgSrc . "'>";
   $sideBarText .= "<h2>" . $fullName . "</h2>";
   $sideBarText .= "<h3>" . $dept['dept_desc'] . "</h3>";
   $caption = "{$fullName}";
   $returnDestination = 'professors';
}

?>

<main class='schedules'>
   <div class='schedules__Details'>
      <div class='schedules__Actions'>
         <a class='schedules__Action' href='<?php echo "./$returnDestination.php" ?>'><img src='./drawables/icons/return.svg' /><span>Back</span></a>
         <button class='schedules__Action' onclick=" PrintContent() "><img src='./drawables/icons/printer.svg' /><span>Print</span></button>
      </div>
      <!-- <div class='schedules__Nav'>
         <input type="radio" name="schedule-details" id="information" onclick="ToggleSchedNav()" checked>
         <label for='information'>Information</label>
          <span>\</span>
         <input type="radio" name="schedule-details" id="settings" onclick="ToggleSchedNav()">
         <label for='settings'>Settings</label>
   </div> -->
      <section class="schedules__Information" id='information-con'>
         <div>
            <?php

            echo $sideBarText;

            ?>
         </div>
         <?php

         if ($_SESSION['type'] != 'Program Head') {
            echo "<a href='?type=$type&id=$ID&action' class='form__Toggle schedules__Add'>Add Schedule</a>";
         }
         ?>
      </section>
   </div>
   <div class='schedules__Table'>
      <?php


      $schedView->DisplaySchedule($caption, $startTime, $endTime, $jumpTime, $type, $ID, $schoolYearID);

      ?>

   </div>
   <?php
   if (isset($_GET['action']) || isset($_GET['schedid'])) {
      include_once './layouts/schedules.form.php';
   }

   ?>
</main>

<?php
include_once './layouts/__footer.php';
?>