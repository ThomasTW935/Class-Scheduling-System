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
               $depts = $deptView->FetchDeptFaculty();
               foreach($depts as $dept){
                  echo "<ul class='module__List'>
                     <li class='module__Item'>". $dept['dept_name'] ."</li>
                     <li class='module__Item'>". $dept['dept_desc'] ."</li>
                     <li class='module__Item'><a href=?id=". $dept['dept_id'] .">Edit</a></li>
                     <li class='module__Item'>
                        <form action='./includes/departments.inc.php' method='POST'>
                           <input name='id' type='hidden' value='". $dept['dept_id'] ."'>
                           <button name='delete' type='submit'>Remove</button>
                        </form>
                     </li>
                  </ul>";
               }
            ?>
         </div>
         <?php
            if(isset($_GET['add']) || isset($_GET['id'])){
               include_once './layouts/deptfaculty.form.php';
            }
         ?>
   
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>