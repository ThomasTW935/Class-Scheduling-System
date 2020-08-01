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

?>

<main class='schedules'>
   <div class='schedules__Details'>
      <section class="schedules__Information">
         <div>
            <?php
            if ($type == 'sect' || empty($type) || $type == null) {
               $sectID = $ID;
               $sect = $sectView->FetchSectionByID($sectID)[0];
               $dept = $deptView->FetchDeptByID($sect['dept_id'])[0];
               echo "<h1>" . $sect['sect_name'] . "</h1>";
               echo "<h3>" . $sect['sect_year'] . " YEAR " . $sect['sect_sem'] . " SEMESTER</h3>";
               echo "<h4>" . $dept['dept_desc'] . "</h4>";
            }
            if ($type == 'room') {
               $roomID = $ID;
               $room = $roomView->FetchRoomByID($roomID)[0];
               $floor = $roomView->FloorConvert($room['rm_floor']);
               echo "<h1>" . $room['rm_name'] . "</h1>";
               echo "<h3>" . $room['rm_desc'] . "</h3>";
               echo "<h4>" . $floor . " Floor</h4>";
            }
            if ($type == 'subj') {
               $subjID = $ID;
               $subj = $subjView->FetchSubjectByID($subjID)[0];
               echo "<h1>" . $subj['subj_code'] . ' - ' . $subj['subj_desc'] . "</h1>";
               echo "<h3>" . $subj['units'] . " Unit/s</h3>";
            }
            if ($type == 'prof') {
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
         <a href='<?php echo "?type=$type&id=$ID&action" ?>' class='form__Toggle'>Add Schedules</a>
      </section>
      <section class='schedules__Settings'>
         <form id='formSettings' action="./includes/schedules.inc.php" method='POST'>
            <input type="hidden" name="id" value=<?php echo $dTime['op_id'] ?>>
            <input type="hidden" name="typeID" value=<?php echo $ID ?>>
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

         for ($i = $newStartTime; $i < $newEndTime; $i += 15 * 60) {
            $timeDisplay = (($i + $jumpTime * 60) - $newStartTime) / 60;
            echo "<li>";
            if ($timeDisplay % $jumpTime == 0) {
               $toTime = $i + $jumpTime * 60;
               echo date('g:i A', $i) . " - " . date('g:i A', $toTime);
            } else {
               echo "<span>-</span>";
            }
            echo "</li>";
         }

         ?>
      </ul>
      <ul class="schedules__TimeSlot">

         <?php

         $days = array();
         for ($i = 0; $i < 6; $i++) {
            $days[$i] = array();
         }
         for ($i = $newStartTime; $i < $newEndTime; $i += 15 * 60) {
            $timeDisplay = (($i + $jumpTime * 60) - $newStartTime) / 60;
            $days[0][$i] = '<li></li>';
         }

         for ($i = 1; $i < sizeof($days); $i++) {
            $days[$i] = $days[0];
         }
         $timeSlots = $schedView->FetchTimeSlotValue($type, $ID);
         for ($i = 0; $i < sizeof($days); $i++) {
            echo '<ul>';
            foreach ($days[$i] as $x => $xValue) {
               $dayOfWeek = '';
               switch ($i) {
                  case 0:
                     $dayOfWeek = 'Monday';
                     break;
                  case 1:
                     $dayOfWeek = 'Tuesday';
                     break;
                  case 2:
                     $dayOfWeek = 'Wednesday';
                     break;
                  case 3:
                     $dayOfWeek = 'Thursday';
                     break;
                  case 4:
                     $dayOfWeek = 'Friday';
                     break;
                  case 5:
                     $dayOfWeek = 'Saturday';
                     break;
               }
               $top = "";
               $mid = "";
               $bot = "";
               foreach ($timeSlots as $timeSlot) {
                  switch ($type) {
                     case 'prof':
                        $top = $timeSlot['subj_desc'] ?? "";
                        $mid = $timeSlot['rm_name'] ?? "";
                        $bot = $timeSlot['sect_name'] ?? "";
                        break;
                     case 'subj':
                        $top = $timeSlot['sect_name'] ?? "";
                        $mid = $timeSlot['rm_name'] ?? "";
                        $bot = $timeSlot['last_name'] ?? "";
                        break;
                     case 'room':
                        $top = $timeSlot['subj_desc'] ?? "";
                        $mid = $timeSlot['sect_name'] ?? "";
                        $bot = $timeSlot['last_name'] ?? "";
                        break;
                     case 'sect':
                        break;
                        $top = $timeSlot['subj_desc'] ?? "";
                        $mid = $timeSlot['rm_name'] ?? "";
                        $bot = $timeSlot['last_name'] ?? "";
                        break;
                     default:
                        $top = $timeSlot['subj_desc'] ?? "";
                        $mid = $timeSlot['rm_name'] ?? "";
                        $bot = $timeSlot['last_name'] ?? "";
                  }
                  $slotLabels = array(
                     'top' => $top,
                     'mid' => $mid,
                     'bot' => $bot
                  );

                  if ($dayOfWeek == $timeSlot['sched_day']) {

                     if ($x >= strtotime($timeSlot['sched_from']) && $x < strtotime($timeSlot['sched_to'])) {
                        echo "<script type='text/javascript'>
                        var slotsLabel;
                        slotsLabel = " . json_encode($slotLabels, JSON_PRETTY_PRINT) . "
                        </script>";
                        $xValue = "<li class='slot slot{$timeSlot['sched_id']}' style=' --display-text: blue '><a class='form__Toggle' href='?type=$type&id=$ID&schedid={$timeSlot['sched_id']}'>";
                        if ($x == strtotime($timeSlot['sched_from'])) {
                           $xValue .= $timeSlot['subj_desc'];
                           $xValue .= $timeSlot['last_name'];
                        }
                        $xValue .= "</a></li>";
                     }
                  }
               }
               echo $xValue;
            }
            echo '</ul>';
         }
         //$day = $timeSlot[0][0];
         ?>
      </ul>
      <?php



      ?>
      </ul>

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