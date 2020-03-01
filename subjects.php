<?php
   include_once './layouts/__header.php';
?>
      
      <main class='subjects module'>
         <div class="module__Header">
            <div></div>
            <img src="drawables/icons/subjects.svg" alt="Subjects">
            <a href='?add' class='module__Add button'>ADD</a>
         </div>
         <div class='module__Container'>
            <ul class='module__List module__Title'>
               <li class='module__Item'>Subject Code</li>
               <li class='module__Item'>Subject Description</li>
               <li class='module__Item'>Unit/s</li>
               <li class='module__Item'></li>
               <li class='module__Item'></li>
            </ul>
            <?php
               $subjView = new SubjectsView();
               $subjs = $subjView->DisplaySubjects();
               foreach($subjs as $subj){
                  echo "<ul class='module__List'>
                     <li class='module__Item'>". $subj['subj_code'] ."</li>
                     <li class='module__Item'>". $subj['subj_desc'] ."</li>
                     <li class='module__Item'>". $subj['units'] ."</li>
                     <li class='module__Item'><a href=?id=". $subj['subj_id'] .">Edit</a></li>
                     <li class='module__Item'>
                        <form onsubmit='return submitForm(this)' action='./includes/subjects.inc.php' method='POST'>
                           <input name='id' type='hidden' value='". $subj['subj_id'] ."'>
                           <button name='delete' type='submit'>Remove</button>
                        </form>
                     </li>
                  </ul>";
               }
            ?>
         </div>
         <?php
            if(isset($_GET['add']) || isset($_GET['id'])){
               include_once './layouts/subjects.form.php';
            }
         ?>
   
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>