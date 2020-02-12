<?php
   include_once './layouts/__header.php';
?>
       
   <?php
      $dept = new DepartmentsView();
      $dept->showDeptFaculty();
   ?>
      
<?php
   include_once './layouts/__footer.php';
?>