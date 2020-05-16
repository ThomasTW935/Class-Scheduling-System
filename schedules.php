<?php
include_once './layouts/__header.php';


$deptView = new DepartmentsView();
$sectView = new SectionsView();
$roomView = new RoomsView();
$profView = new ProfessorsView();
$subjView = new SubjectsView();

$load = $_GET['load'];

$startTime;
$endTime;
$jumpTime;

?>

<main class='schedules'>
   <div class='schedules__Details'>
      <section class="schedules__Information">
         <div>
            <?php
            $ID = $_GET['id'];
            if ($load == 'sect' || empty($load) || $load == null) {
               $sectID = $ID;
               $sect = $sectView->FetchSectionByID($sectID)[0];
               $dept = $deptView->FetchDeptByID($sect['dept_id'])[0];
               echo "<h1>" . $sect['sect_name'] . "</h1>";
               echo "<h3>" . $sect['sect_year'] . " YEAR " . $sect['sect_sem'] . " SEMESTER</h3>";
               echo "<h4>" . $dept['dept_desc'] . "</h4>";
            }
            if ($load == 'room') {
               $roomID = $ID;
               $room = $roomView->FetchRoomByID($roomID)[0];
               $floor = $roomView->FloorConvert($room['rm_floor']);
               $startTime = $room['rm_starttime'];
               $endTime = $room['rm_endtime'];
               $jumpTime = $room['rm_jumptime'];
               echo "<h1>" . $room['rm_name'] . "</h1>";
               echo "<h3>" . $room['rm_desc'] . "</h3>";
               echo "<h4>" . $floor . " Floor</h4>";
            }
            if ($load == 'subj') {
               $subjID = $ID;
               $subj = $subjView->FetchSubjectByID($subjID)[0];
               echo "<h1>" . $subj['subj_code'] . ' - ' . $subj['subj_desc'] . "</h1>";
               echo "<h3>" . $subj['units'] . " Unit/s</h3>";
            }
            if ($load == 'prof') {
               $profID = $ID;
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
         <a href="?add&load=<?php echo $load ?>&id=<?php echo $ID ?>">Add Schedules</a>
      </section>
      <section class='schedules__Settings'>
         <form id='formSettings' action="./includes/schedules.inc.php" method='POST'>
            <input type="hidden" name="id" value=<?php echo $ID ?>>
            <input type="hidden" name="type" value=<?php echo $load ?>>
            <div>
               <label for="startTime">Start:</label>
               <select id='startTime' name="startTime">
                  <?php
                  $newStartTime = strtotime($startTime);
                  for ($i = strtotime('0:00'); $i <= strtotime('23:00'); $i += 60 * 60) {
                     echo "<option value = '" . date('H:i', $i) . "' ";
                     if ($i == $newStartTime) {
                        echo "selected >" . date('g:i A', $i);
                     } else {
                        echo " >" . date('g:i A', $i);
                     }
                     echo "</option>";
                  }
                  ?>
               </select>
            </div>
            <div>
               <label for="endTime">End:</label>
               <select id="endTime" name="endTime">
                  <?php
                  $newEndTime = strtotime($endTime);
                  for ($i = $newStartTime + (60 * 60); $i <= $newStartTime + (60 * 60 * 23); $i += 60 * 60) {
                     echo "<option value = '" . date('H:i', $i) . "' ";
                     if ($i == $newEndTime) {
                        echo "selected >" . date('g:i A', $i);
                     } else {
                        echo " >" . date('g:i A', $i);
                     }
                     echo "</option>";
                  }

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
      <ul class="schedules__Day">
         <li>Monday</li>
         <li>Tuesday</li>
         <li>Wednesday</li>
         <li>Thursday</li>
         <li>Friday</li>
         <li>Saturday</li>
      </ul>
      <ul class="schedules__Time">

         <?php

         $days = array();
         for ($i = 0; $i < 6; $i++) {
            $days[$i] = array();
         }
         for ($i = $newStartTime; $i <= $newEndTime; $i += 15 * 60) {
            $timeDisplay = (($i + $jumpTime * 60) - $newStartTime) / 60;
            $days[0][date('g:i A', $i)] = "";
         }

         for ($i = 1; $i < sizeof($days); $i++) {
            $days[$i] = $days[0];
         }

         echo sizeof($days)

         ?>
      </ul>
      <?php



      ?>
      </ul>

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