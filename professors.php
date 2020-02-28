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
               <li class='module__Item'>Employee ID</li>
               <li class='module__Item'>Employee Name</li>
               <li class='module__Item'>Department</li>
               <li class='module__Item'></li>
               <li class='module__Item'></li>
               <li class='module__Item'></li>
            </ul>
            <?php
               $profView = new ProfessorsView();
               $profView->DisplayProfessors();
            ?>
         </div>
         <?php
            //if(isset($_GET['add']) || isset($_GET['id'])){
               //include_once './layouts/professors.form.php';
            //}
         ?>
         <form action='./includes/professors.inc.php'  method='POST' enctype="multipart/form-data">
               <span>asldkmsaldkmsaldkasmd</span>
            <input type="text">
            <input type="text">
            <input type="text">
         </form>
   
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>