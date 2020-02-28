<?php
   include_once './layouts/__header.php';
?>
      
      <main class='professors module'>
         <div class="module__Header">
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
               <input id="liveSearch" type="search" name="q" placeholder="Search...">
               <button name="search" type="submit">Send</button>
            </form>
            <img src="drawables/icons/professor.svg">
            <a href='?add' class='module__Add button'>ADD</a>
         </div>
         <div class='module__Container'>
            <ul class='module__List module__Title'>
               <li class='module__Item'></li>
               <li class='module__Item'>Employee ID</li>
               <li class='module__Item'>Employee Name</li>
               <li class='module__Item'>Department</li>
               <li class='module__Item'></li>
               <li class='module__Item'></li>
               <li class='module__Item'></li>
            </ul>
            <?php
               $profView = new ProfessorsView();
               if(isset($_GET['q'])){
                  $results = $profView->FetchProfessorsBySearch($_GET['q']);
                  if(empty($results))
                     echo '<h2>No matches found.</h2>';
               } else{
                  $results = $profView->DisplayProfessors();
               }
               
               foreach($results as $result){
                  $imgSrc = $result['prof_img'];
                  if(empty($result['prof_img']))
                     $imgSrc = "professor.png";

                  $middleInitial = (!empty($result['middle_initial'])) ? $result['middle_initial'].'.' : '';
                  $fullName = "{$result['last_name']}, {$result['first_name']} {$middleInitial} {$result['suffix']}"; 
                  echo "<ul class='module__List'>
                     <li class='module__Item'><img src='./drawables/images/". $imgSrc ."'></li>
                     <li class='module__Item'>". $result['emp_no'] ."</li>
                     <li class='module__Item'>". $fullName ."</li>
                     <li class='module__Item'>". $result['dept_name'] ."</li>
                     <li class='module__Item'><a href='#'>CheckSchedule</a></li>
                     <li class='module__Item'><a href=?id=". $result['id'] ."> Edit</a></li>
                     <li class='module__Item'>
                        <form onsubmit='return submitForm(this)' action='./includes/professors.inc.php' method='POST'>
                           <input name='id' type='hidden' value='". $result['id'] ."'>
                           <button name='delete' type='submit'>Remove</button>
                        </form>
                     </li>
                  </ul>";
               }
            ?>
         </div>
         <?php
            if(isset($_GET['add']) || isset($_GET['id'])){
               include_once './layouts/professors.form.php';
            }
         ?>
   
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>