<?php
include_once './layouts/__header.php';


$deptView = new DepartmentsView();
$sectView = new SectionsView();
$roomView = new RoomsView();
$profView = new ProfessorsView();
$subjView = new SubjectsView();
$schedView = new SchedulesView();
$type = $_POST['type'] ?? $_GET['type'];
$ID = $_POST['id'] ?? $_GET['id'];
if (!isset($type) xor empty($type)) {
   header('Location: ./dashboard.php');
   exit();
}
$dTime = $schedView->FetchDisplayTime($type, $ID)[0];
$startTime = $dTime['op_start'];
$endTime   = $dTime['op_end'];
$jumpTime  = $dTime['op_jump'];

$sideBarText = '';
$returnDestination = '';

if ($type == 'sect' || empty($type) || $type == null) {
   $sectID = $ID;
   $sect = $sectView->FetchSectionByID($sectID)[0];
   $dept = $deptView->FetchDeptByID($sect['dept_id'])[0];
   $sideBarText .= "<h2>" . $sect['sect_name'] . "</h2>";
   $sideBarText .= "<h3>" . $sect['sect_year'] . " YEAR " . $sect['sect_sem'] . " SEMESTER</h3>";
   $sideBarText .= "<h4>" . $dept['dept_desc'] . "</h4>";
   $caption = "{$sect['sect_name']}";
   $returnDestination = 'sections';
} else if ($type == 'room') {
   $roomID = $ID;
   $room = $roomView->FetchRoomByID($roomID)[0];
   $floor = $roomView->FloorConvert($room['rm_floor']);
   $sideBarText .= "<h2>" . $room['rm_name'] . "</h2>";
   $sideBarText .= "<h3>" . $room['rm_desc'] . "</h3>";
   $sideBarText .= "<h4>" . $floor . " Floor</h4>";
   $caption = "Rm.{$room['rm_name']}";
   $returnDestination = 'rooms';
} else if ($type == 'subj') {
   $subjID = $ID;
   $subj = $subjView->FetchSubjectByID($subjID)[0];
   $sideBarText .= "<h2>" . $subj['subj_code'] . ' - ' . $subj['subj_desc'] . "</h2>";
   $sideBarText .= "<h3>" . $subj['units'] . " Unit/s</h3>";
   $caption = "{$subj['subj_code']}";
   $returnDestination = 'subjects';
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
      <a class='schedules__Back' href='<?php echo "./$returnDestination.php" ?>'><img src='./drawables/icons/return.svg' /><span>Back</span></a>
      <section class="schedules__Information">
         <div>
            <?php

            echo $sideBarText;

            ?>
         </div>
         <a href='<?php echo "?type=$type&id=$ID&action" ?>' class='form__Toggle schedules__Add'>Add Schedule</a>
      </section>
      <section class='schedules__Settings'>
         <form id='formSettings' action="./includes/schedules.inc.php" method='POST'>
            <input type="hidden" name="opID" value=<?php echo $dTime['op_id'] ?>>
            <input type="hidden" name="id" value=<?php echo $ID ?>>
            <input type="hidden" name="type" value=<?php echo $type ?>>
            <div>
               <label for="startTime">Start:</label>
               <select id='startTime' name="startTime">
                  <?php

                  $newStartTime = strtotime($startTime);
                  $schedView->GenerateTimeOptions(strtotime('0:00'), strtotime('23:00'), $newStartTime);

                  ?>
               </select>
            </div>
            <div>
               <label for="endTime">End:</label>
               <select id="endTime" name="endTime">
                  <?php

                  $newEndTime = strtotime($endTime);
                  $schedView->GenerateTimeOptions($newStartTime + (60 * 60),  $newStartTime + (60 * 60 * 23), $newEndTime);


                  ?>
               </select>
            </div>
            <div>
               <label for="jumpTime">View By:</label>
               <select id='jumpTime' name='jumpTime'>
                  <?php
                  for ($i = 15; $i <= 60; $i += 15) {
                     $selected = ($jumpTime == $i) ? 'selected' : '';
                     echo "<option value='$i' $selected>$i minutes</option>";
                  }

                  ?>
               </select>
            </div>
            <button class='button' type="submit" name="scheduleSave">Save</button>
         </form>
      </section>
   </div>
   <div class='schedules__Table'>
      <?php


      $schedView->DisplaySchedule($caption, $newStartTime, $newEndTime, $jumpTime, $type, $ID);

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