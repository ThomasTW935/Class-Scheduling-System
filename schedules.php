<?php
   include_once './layouts/__header.php';
?>
      
      <main class='schedules'>
        <div class='schedules__Details'>
            <section class='schedules__Settings'>
               <form id='formSettings' action="./includes/schedules.inc.php">
                  <label for="startTime">Start:</label>
                  <input id='startTime' type="time" name='startTime' value='07:00'>
                  <label for="endTime">End:</label>
                  <input id='endTime' type="time" name='endTime' value='07:00'>
                  <label  for="incrementTime">Increment:</label>
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
                        foreach($results as $result){
                           echo '<li draggable="true">'. $result['subj_code'] .' - '. $result['subj_desc'] .'</li>';
                        }


                     ?>

                  </ul>
               </div>
            </section>
            <section></section>
        </div>
        <div class = 'schedules__Table'>
           <ul class="schedules__Hours">
              <?php 
              
                 $fromTime = strtotime('7:00');
                 $toTime = strtotime('17:00');
                 for($i = $fromTime;$i<=$toTime; $i+= 15*60){
                    echo "<li class='schedules__Hour'>". date('g:i a',$i) ."</li>";
                 }

              ?>
           </ul>
           <ul class="schedules__Days">
              <li class="schedules__Day">Monday</li>
              <li class="schedules__Day">Tuesday</li>
              <li class="schedules__Day">Wednesday</li>
              <li class="schedules__Day">Thursday</li>
              <li class="schedules__Day">Friday</li>
              <li class="schedules__Day">Saturday</li>
            </ul>
            <div class="schedules__Items"></div>
        </div>
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>