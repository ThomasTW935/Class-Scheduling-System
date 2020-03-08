<?php
include_once './layouts/__header.php';

$timeSlot = [
   'startTime' => '7:00',
   'endTime' => '10:00',
   'professor' => 'Insigne, John Rexon',
   'subject' => 'Mobile Development',
   'room' => 'rm507',
   'section' => 'BSIT-701',
   'day' => 'Monday'
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

               <?php

               $subj = new SubjectsView();
               $results = $subj->DisplaySubjects();
               foreach ($results as $result) {
                  echo '<li draggable="true">' . $result['subj_code'] . ' - ' . $result['subj_desc'] . '</li>';
               }


               ?>

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
      $monday = [];
      foreach ($days as $day) {
         for ($i = $fromTime; $i <= $toTime; $i += 30 * 60) {
            foreach ($schedules as $schedule) {
               $startTime = strtotime($schedule['startTime']);
               $endTime = strtotime($schedule['endTime']);
               $value;
               if ($i >= $startTime && $i <= $endTime && $schedule['day'] == $day) {
                  if ($i == $startTime) {
                     $value = $schedule['subject'];
                  }
                  $middle = ($startTime + $endTime) / 2;
                  if ($i == $middle) {
                     $value = $schedule['professor'];
                  }
                  if ($i == $endTime) {
                     $value = "" . $schedule['room'] . "";
                  }
                  echo $value;
               } else {
                  $value = 's';
               }
            }
            if ($day == 'Monday') {
               $monday =  [$i => $value];
               var_dump($monday);
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