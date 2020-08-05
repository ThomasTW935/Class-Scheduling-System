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
               $caption = "Rm.{$room['rm_name']}";
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
      <table>
         <caption><?php echo $caption ?> </caption>
         <tr>
            <th></th>
            <?php
            $daysWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

            foreach ($daysWeek as  $dayWeek) {
               echo "<th>$dayWeek</th>";
            }
            ?>
         </tr>
         <?php
         $values = array();
         $schedSlots = $schedView->FetchTimeSlotValue($type, $ID);
         for ($i = $newStartTime; $i < $newEndTime; $i += 15 * 60) {
            $timeDisplay = (($i + $jumpTime * 60) - $newStartTime) / 60;
            if ($timeDisplay % $jumpTime == 0) {
               $toTime = date('g:i A', ($i + $jumpTime * 60));

               $time = date('g:i A', $i);
               $values[$time] = array();
               $cellValue =  "<span class='table__Time'>$time - $toTime</span>";
               array_push($values[$time], $cellValue);
               foreach ($daysWeek as $days) {
                  $cellValue = '';
                  foreach ($schedSlots as $schedSlot) {
                     if ($days == $schedSlot['sched_day']) {
                        if ($i >= strtotime($schedSlot['sched_from']) && $i < strtotime($schedSlot['sched_to'])) {
                           $subjDesc = $schedSlot['subj_desc'] ?? $schedSlot['sched_from'];
                           $sectName = $schedSlot['sect_name'] ?? $schedSlot['sched_to'];
                           $lastName = $schedSlot['last_name'] ?? ' ';
                           $cellValue = "<a class='form__Toggle' href='?type=$type&id=$ID&schedid={$schedSlot['sched_id']}'>
                                <span>$subjDesc</span>
                                <span>$sectName</span> 
                                <span>$lastName</span>
                                </a>";
                        }
                     }
                  }
                  array_push($values[$time], $cellValue);
               }
            }
         }
         foreach ($values as $key => $value) {
            echo "<tr>";
            foreach ($value as $x) {
               if (!empty($x)) {
                  echo "<td class='slot'>$x</td>";
               } else {
                  echo "<td>$x</td>";
               }
            }
            echo "</tr>";
         }

         ?>
      </table>
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