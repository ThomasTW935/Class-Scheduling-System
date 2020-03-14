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
      <section class='schedules__LoadSched'>


         <a href='?load'>Load</a>



      </section>
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