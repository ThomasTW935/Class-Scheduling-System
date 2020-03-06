<?php
include_once './layouts/__header.php';
?>

<main class='departments module'>
   <div class="module__Header">
      <div></div>
      <div class="module__Logo">
         <img src="drawables/icons/faculty.svg" alt="faculty">
         <a href='?#' class="button">Faculty</a>
      </div>
      <div class="module__Links">
         <a href='?add' class='module__Add button'>ADD</a>
         <a href='?archive' class='module__Archive button'>Archive</a>
      </div>
   </div>
   <div class='module__Container'>
      <ul class='module__List module__Title'>
         <li class='module__Item'>Department Name</li>
         <li class='module__Item'>Description</li>
         <li class='module__Item'>Actions</li>
      </ul>
      <?php

      $url = $_SERVER['REQUEST_URI'];
      $path = parse_url($url, PHP_URL_PATH);

      $department = "";
      $departments = ['faculty', 'strand', 'course'];
      foreach ($departments as $item) {
         if (strpos($path, $item)) {
            $department = $item;
         }
      }
      $deptView = new DepartmentsView();
      $depts = $deptView->FetchDepts($department);
      foreach ($depts as $dept) {
         echo "<ul class='module__List'>
                     <li class='module__Item'>" . $dept['dept_name'] . "</li>
                     <li class='module__Item'>" . $dept['dept_desc'] . "</li>
                     <li class='module__Item'>
                     <div>
                        <a href=?id=" . $dept['dept_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>
                        <form onsubmit='return submitForm(this)' action='./includes/departments.inc.php' method='POST'>
                           <input name='id' type='hidden' value='" . $dept['dept_id'] . "'>
                           <button name='delete' type='submit'><img src='drawables/icons/delete.svg' alter='Delete'/></button>
                           <span>Delete</span>
                        </form>
                     </div>
                     </li>
                  </ul>";
      }
      ?>
   </div>
   <?php
   if (isset($_GET['add']) || isset($_GET['id'])) {
      include_once './layouts/departments.form.php';
   }
   ?>

</main>

<?php
include_once './layouts/__footer.php';
?>