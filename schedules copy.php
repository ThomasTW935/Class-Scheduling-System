<?php
include_once './layouts/__header.php';

$timeSlot = [
   'startTime' => '9:15',
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

$fromTime = $_GET['from'] ?? '07:00';
$toTime = $_GET['to'] ?? '17:00';
$view = $_GET['view'] ?? '15';

?>

<main class='schedules'>
   <div class='schedules__Details'>
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

      $fromTime = strtotime($fromTime);
      $toTime = strtotime($toTime);
      echo '<ul>';
      echo "<li><span>s</span></li>";
      $skipTime = $fromTime;
      for ($i = $fromTime; $i <= $toTime; $i += 15 * 60) {
         $baseValue = ($view * 60);
         $diff  = $i - $fromTime;
         if ($diff % $baseValue == 0) {
            echo "<li class='schedules__Hour'>" . date('g:i a', $i) . "</li>";
         } else {
            echo "<li class='schedules__Hour'><span>s</span></li>";
         }
      }
      echo '</ul>';
      foreach ($days as $day) {
         echo '<ul>';
         echo "<li>{$day}</li>";
         foreach ($schedules as $schedule) {
            for ($i = $fromTime; $i <= $toTime; $i += 15 * 60) {
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