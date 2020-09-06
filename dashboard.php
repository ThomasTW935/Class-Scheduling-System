<?php
include_once './layouts/__header.php';
if ($sessionType == 1) {
   header("Location: ./scheduleview.php");
   exit();
}



?>

<main class="dashboard">
   <h3><?php echo $schoolYearText ?></h3>
   <div class="dashboard__Container">
      <a class="dashboard__Card card__Design" href="./professors.php?page=1">
         <h3>PROFESSORS</h3>
         <img src="./drawables/icons/professor.svg" alt="Professors">
      </a>
      <a class="dashboard__Card card__Design" href="./rooms.php?page=1">
         <h3>ROOMS</h3>
         <img src="./drawables/icons/rooms.svg" alt="Professors">
      </a>
      <a class="dashboard__Card card__Design" href="./sections.php?page=1">
         <h3>SECTIONS</h3>
         <img src="./drawables/icons/section.svg" alt="SECTIONS">
      </a>
      <a class="dashboard__Card card__Design" href="./subjects.php?page=1">
         <h3>SUBJECTS</h3>
         <img src="./drawables/icons/subjects.svg" alt="SUBJECTS">
      </a>

      <a class="dashboard__Card card__Design" href="./department.php?dept=course&page=1">
         <h3>COURSES</h3>
         <img src="./drawables/icons/course.svg" alt="course">
      </a>
      <a class="dashboard__Card card__Design" href="./department.php?dept=strand&page=1">
         <h3>STRANDS</h3>
         <img src="./drawables/icons/strand.svg" alt="strand">
      </a>
      <a class="dashboard__Card card__Design" href="./department.php?dept=faculty&page=1">
         <h3>FACULTY</h3>
         <img src="./drawables/icons/faculty.svg" alt="faculty">
      </a>
      <a class="dashboard__Card card__Design" href="./settings.php?page=1">
         <h3>Settings</h3>
         <img src="./drawables/icons/settings.svg" alt="Settings">
      </a>
      <?php

      if ($_SESSION['type'] == 4) {
         echo "<a class='dashboard__Card card__Design' href='./users.php?page=1'>
         <h3>USERS</h3>
         <img src='./drawables/icons/student.svg'; alt='Users'>
         </a>";
      }

      ?>


   </div>
</main>

<?php
include_once './layouts/__footer.php';
?>