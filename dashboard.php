<?php
include_once './layouts/__header.php';
?>

<main class="dashboard">
   <div class="dashboard__Container">
      <a class="dashboard__Card card__Design" href="./professors.php">
         <h3>PROFESSORS</h3>
         <img src="./drawables/icons/professor.svg" alt="Professors">
      </a>
      <a class="dashboard__Card card__Design" href="./users.php">
         <h3>USERS</h3>
         <img src="./drawables/icons/student.svg" alt="Users">
      </a>
      <a class="dashboard__Card card__Design" href="./rooms.php">
         <h3>ROOMS</h3>
         <img src="./drawables/icons/rooms.svg" alt="Professors">
      </a>
      <a class="dashboard__Card card__Design" href="./department.php?dept=course">
         <h3>COURSES</h3>
         <img src="./drawables/icons/course.svg" alt="Professors">
      </a>
      <a class="dashboard__Card card__Design" href="./department.php?dept=strand">
         <h3>STRANDS</h3>
         <img src="./drawables/icons/strand.svg" alt="Professors">
      </a>
      <a class="dashboard__Card card__Design" href="./department.php?dept=faculty">
         <h3>FACULTY</h3>
         <img src="./drawables/icons/faculty.svg" alt="Professors">
      </a>
      <a class="dashboard__Card card__Design" href="./sections.php">
         <h3>SECTIONS</h3>
         <img src="./drawables/icons/section.svg" alt="SECTIONS">
      </a>
      <a class="dashboard__Card card__Design" href="./subjects.php">
         <h3>SUBJECTS</h3>
         <img src="./drawables/icons/subjects.svg" alt="SUBJECTS">
      </a>
   </div>
</main>

<?php
include_once './layouts/__footer.php';
?>