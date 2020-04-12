<?php
include_once './layouts/__header.php';

$fromTime = $_GET['from'] ?? '07:00';
$toTime = $_GET['to'] ?? '17:00';
$view = $_GET['view'] ?? '15';


$deptView = new DepartmentsView();
$sectView = new SectionsView();
$roomView = new RoomsView();
$profView = new ProfessorsView();
$subjView = new SubjectsView();

$load = $_GET['load'];

?>

<main class='schedules'>
   <div class='schedules__Details'>
      <section class="schedules__Information">
         <div>
            <?php

            if ($load == 'sect') {
               $sectID = $_GET['id'];
               $sect = $sectView->FetchSectionByID($sectID)[0];
               $dept = $deptView->FetchDeptByID($sect['dept_id'])[0];
               echo "<h1>" . $sect['sect_name'] . "</h1>";
               echo "<h3>" . $sect['sect_year'] . " YEAR " . $sect['sect_sem'] . " SEMESTER</h3>";
               echo "<h4>" . $dept['dept_desc'] . "</h4>";
            }
            if ($load == 'room') {
               $roomID = $_GET['id'];
               $room = $roomView->FetchRoomByID($roomID)[0];
               $floor = $roomView->FloorConvert($room['rm_floor']);
               echo "<h1>" . $room['rm_name'] . "</h1>";
               echo "<h3>" . $room['rm_desc'] . "</h3>";
               echo "<h4>" . $floor . "</h4>";
            }
            if ($load == 'subj') {
               $subjID = $_GET['id'];
               $subj = $subjView->FetchSubjectByID($subjID)[0];
               echo "<h1>" . $subj['subj_code'] . ' - ' . $subj['subj_desc'] . "</h1>";
               echo "<h3>" . $subj['units'] . " Unit/s</h3>";
            }
            if ($load == 'prof') {
               $profID = $_GET['id'];
               $prof = $profView->FetchProfessorByID($profID)[0];
               $dept = $deptView->FetchDeptByID($prof['dept_id'])[0];
               $imgSrc = $prof['prof_img'];
               if (empty($prof['prof_img']))
                  $imgSrc = "professor.png";
               $middleInitial = (!empty($prof['middle_initial'])) ? $prof['middle_initial'] . '.' : '';
               $fullName = "{$prof['last_name']}, {$prof['first_name']} {$middleInitial} {$prof['suffix']}";
               echo "<img src='./drawables/images/" . $imgSrc . "'>";
               echo "<h1>" . $fullName . "</h1>";
               echo "<h4>" . $dept['dept_desc'] . "</h4>";
            }

            ?>
         </div>
         <a href="?add&load=<?php echo $load ?>&id=<?php echo $_GET['id'] ?>">Add Schedules</a>
      </section>
      <section class='schedules__Settings'>
         <form id='formSettings' action="./includes/schedules.inc.php" method='POST'>
            <div>
               <label for="fromTime">Start:</label>
               <input id='fromTime' type="time" name='fromTime' value='<?php echo $fromTime ?>'>
            </div>
            <div>
               <label for="toTime">End:</label>
               <input id='toTime' type="time" name='toTime' value='<?php echo $toTime ?>'>
            </div>
            <div>
               <label for="viewBy">View By:</label>
               <select id='viewBy' name='viewBy'>
                  <?php
                  for ($i = 15; $i <= 60; $i += 15) {
                     $selected = ($view == $i) ? 'selected' : '';
                     echo "<option value='$i' $selected>$i minutes</option>";
                  }

                  ?>
               </select>
            </div>

            <button class='button' type="submit" name="submit">Save</button>
         </form>
      </section>
   </div>
   <div class='schedules__Table'>

      <?php



      ?>
   </div>
   <?php

   if (isset($_GET['add']) || isset($_GET['sched'])) {
      include_once './layouts/schedules.form.php';
   }
   // if (isset($_GET['load']) || isset($_GET['sched'])) {
   //    include_once './layouts/schedulesload.form.php';
   // }

   ?>
</main>

<?php
include_once './layouts/__footer.php';
?>