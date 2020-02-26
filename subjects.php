<?php
   include_once './layouts/__header.php';
?>
      
      <main class='professors module'>
         <div class="module__Header">
            <div></div>
            <img src="drawables/icons/professor.svg">
            <a href='?add' class='module__Add button'>ADD</a>
         </div>
         <div class='module__Container'>
            <ul class='module__List module__Title'>
               <li class='module__Item'>Subject Code</li>
               <li class='module__Item'>Subject Description</li>
               <li class='module__Item'></li>
               <li class='module__Item'></li>
               <li class='module__Item'></li>
            </ul>
            <?php
               $subjView = new SubjectsView();
               $subjView->DisplaySubjects();
            ?>
         </div>
         <?php
            if(isset($_GET['add']) || isset($_GET['id'])){
               include_once './layouts/subjectsform.php';
            }
         ?>
   
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>