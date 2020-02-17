<?php
   include_once './layouts/__header.php';
?>
      
      <main class='professors'>
         <a href='?add' class='professors__Add form__Redirect button'>ADD</a>
         <div class='professors__Container'>
            <ul class='professors__List professors__Title'>
               <li class='professors__Item list__item--RightBorder'>Employee ID</li>
               <li class='professors__Item'>Employee Name</li>
               <li class='professors__Item'>Department</li>
               <li class='professors__Item'></li>
               <li class='professors__Item'></li>
               <li class='professors__Item'></li>
            </ul>
            <?php
               $profView = new ProfessorsView();
               $profView->DisplayProfessors();
            ?>
         </div>
         <?php
            if(isset($_GET['add']) || isset($_GET['id'])){
               include_once './layouts/professorsform.php';
            }
         ?>
   
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>