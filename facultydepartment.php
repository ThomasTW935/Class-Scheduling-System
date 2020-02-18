<?php
   include_once './layouts/__header.php';
?>
       
       <main class='departments module'>
         <div class="module__Header">
            <div></div>
            <img src="drawables/icons/faculty.svg">
            <a href='?add' class='module__Add button'>ADD</a>
         </div>
         <div class='module__Container'>
            <ul class='module__List'>
               <li class='module__Item'>Department Name</li>
               <li class='module__Item'>Description</li>
               <li class='module__Item'></li>
               <li class='module__Item'></li>
            </ul>
            <?php
               $deptView = new DepartmentsView();
               $deptView->showDeptFaculty();
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