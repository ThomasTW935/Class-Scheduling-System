<?php
include_once './layouts/__header.php';
?>

<main class='subjects module'>
   <div class="module__Header">
      <div></div>
      <div class="module__Logo">
         <img src="drawables/icons/subjects.svg" alt="Subjects">
         <a href='?#' class="button">Sections</a>
      </div>
      <div class="module__Links">
         <a href='?add' class='module__Add button'>ADD</a>
         <a href='?archive' class='module__Archive button'>Archive</a>
      </div>
   </div>
   <div class='module__Container'>
      <ul class='module__List module__Title'>
         <li class='module__Item'>Name</li>
         <li class='module__Item'>Department</li>
         <li class='module__Item'></li>
         <li class='module__Item'>Actions</li>
      </ul>
      <?php
      $subjView = new SubjectsView();
      $results = $subjView->DisplaySubjects();
      foreach ($results as $result) {
         echo "<ul class='module__List'>
                     <li class='module__Item'>" . $result['subj_code'] . "</li>
                     <li class='module__Item'>" . $result['subj_desc'] . "</li>
                     <li class='module__Item'>" . $result['units'] . "</li>
                     <li class='module__Item'>
                        <div>
                           <a href=?id=" . $result['subj_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>
                           <form onsubmit='return submitForm(this)' action='./includes/sections.inc.php' method='POST'>
                              <input name='id' type='hidden' value='" . $result['subj_id'] . "'>
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
      include_once './layouts/sections.form.php';
   }
   ?>

</main>

<?php
include_once './layouts/__footer.php';
?>