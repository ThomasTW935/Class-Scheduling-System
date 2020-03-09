<?php
include_once './layouts/__header.php';

$timeSlot = [
   'startTime' => '9:00',
   'endTime' => '11:00',
   'professor' => 'Insigne, John Rexon',
   'subject' => '',
   'room' => 'rm507',
   'section' => 'BSIT-701',
   'day' => 'Wednesday'
];
$timeSlot2 = [
   'startTime' => '8:00',
   'endTime' => '10:00',
   'professor' => 'Insigne, John Rexon',
   'subject' => 'Mobile Development',
   'room' => 'rm501',
   'section' => 'BSIT-701',
   'day' => 'Tuesday'
];
$timeSlot3 = [
   'startTime' => '11:00',
   'endTime' => '14:00',
   'professor' => 'Insigne, John Rexon',
   'subject' => 'Mobile Development',
   'room' => 'rm502',
   'section' => 'BSIT-701',
   'day' => 'Tuesday'
];
$timeSlot4 = [
   'startTime' => '15:00',
   'endTime' => '16:30',
   'professor' => 'Insigne, John Rexon',
   'subject' => 'Mobile Development',
   'room' => 'rm504',
   'section' => 'BSIT-701',
   'day' => 'Saturday'
];
$timeSlot5 = [
   'startTime' => '16:00',
   'endTime' => '17:30',
   'professor' => 'Insigne, John Rexon',
   'subject' => 'Mobile Development',
   'room' => 'rm504',
   'section' => 'BSIT-701',
   'day' => 'Friday'
];
$schedules = [$timeSlot, $timeSlot2, $timeSlot3, $timeSlot4];
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
?>

<main class='schedules'>
   <div class='schedules__Details'>
      <section class='schedules__Settings'>
         <form id='formSettings' action="./includes/schedules.inc.php" method='POST'>
            <label for="startTime">Start:</label>
            <input id='startTime' type="time" name='startTime' value='07:00'>
            <label for="endTime">End:</label>
            <input id='endTime' type="time" name='endTime' value='07:00'>
            <label for="incrementTime">Increment:</label>
            <select id='incrementTime' name='endTime' value='07:00'>
               <option value="15">15 minutes</option>
               <option value="30">30 minutes</option>
               <option value="45">45 minutes</option>
               <option value="60">60 minutes</option>
            </select>

            <button type="submit" name="submit">Save</button>
         </form>
      </section>
      <section class='schedules__Subjects'>
         <form>
            <label for="timeSubjects">Search Subjects</label>
            <input type="search" name="searchSubjects" id="searchSubjects">
         </form>
         <div id='searchSubjects__Results'>
            <label for="results__List">Subject List</label>
            <ul id="results__List">

               

            </ul>
         </div>
      </section>
      <section></section>
   </div>
   <div class='schedules__Table'>

      <?php

      $fromTime = strtotime('7:00');
      $toTime = strtotime('17:00');
      $time = [];
      echo '<ul>';
      echo "<li><span>s</span></li>";
      for ($i = $fromTime; $i <= $toTime; $i += 30 * 60) {
         $time[] += $i;
         echo "<li class='schedules__Hour'>" . date('g:i a', $i) . "</li>";
      }
      echo '</ul>';
      foreach ($days as $day) {
         echo '<ul>';
         echo "<li>{$day}</li>";
         foreach ($schedules as $schedule) {
               for ($i = $fromTime; $i <= $toTime; $i += 30 * 60) {
               $startTime = strtotime($schedule['startTime']);
               $endTime = strtotime($schedule['endTime']);
               if ($i >= $startTime && $i <= $endTime && $schedule['day'] == $day) {
                  echo "<li class='schedules__Timeslot'><label>";
                  if ($i == $startTime) {
                     echo "{$schedule['subject']}";
                  }
                  $middle = ($startTime + $endTime) / 2;
                  if ($i == $middle) {
                     echo "{$schedule['professor']}";
                  }
                  if ($i == $endTime) {
                     echo "{$schedule['room']}";
                  }
                  echo "<span>s</span></label></li>";
               } else {
                  echo "<li><span>s</span></li>";
               }
            }
         }
         echo '</ul>';
      }
      ?>
   </div>
</main>

<?php
include_once './layouts/__footer.php';
?>