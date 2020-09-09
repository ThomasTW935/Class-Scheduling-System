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
         <h3>Instructor</h3>
         <img src="./drawables/icons/professor.svg" alt="Professors">
      </a>
      <a class="dashboard__Card card__Design" href="./rooms.php?page=1">
         <h3>Rooms</h3>
         <img src="./drawables/icons/rooms.svg" alt="Professors">
      </a>
      <a class="dashboard__Card card__Design" href="./sections.php?page=1">
         <h3>Sections</h3>
         <img src="./drawables/icons/section.svg" alt="SECTIONS">
      </a>
      <a class="dashboard__Card card__Design" href="./subjects.php?page=1">
         <h3>Subjects</h3>
         <img src="./drawables/icons/subjects.svg" alt="SUBJECTS">
      </a>

      <a class="dashboard__Card card__Design" href="./department.php?dept=course&page=1">
         <h3>Courses</h3>
         <img src="./drawables/icons/course.svg" alt="course">
      </a>
      <a class="dashboard__Card card__Design" href="./department.php?dept=strand&page=1">
         <h3>Strands</h3>
         <img src="./drawables/icons/strand.svg" alt="strand">
      </a>
      <a class="dashboard__Card card__Design" href="./department.php?dept=faculty&page=1">
         <h3>Faculty</h3>
         <img src="./drawables/icons/faculty.svg" alt="faculty">
      </a>
      <a class="dashboard__Card card__Design" href="./settings.php?page=1">
         <h3>School Year</h3>
         <img src="./drawables/icons/calendar.svg" alt="School Year">
      </a>
      <?php

      if ($_SESSION['type'] == 4) {
         echo "<a class='dashboard__Card card__Design' href='./users.php?page=1'>
         <h3>Users</h3>
         <img src='./drawables/icons/student.svg'; alt='Users'>
         </a>";
      }

      ?>


   </div>
</main>

<?php
include_once './layouts/__footer.php';
?>