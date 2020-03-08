<?php
include_once './layouts/__header.php';
?>

<main class='subjects module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchProf" placeholder="Search...">
         <input id="liveSearch--Status" type="hidden" name="status" value="<?php echo $state ?>">
      </form>
      <div class="module__Logo">
         <img src="drawables/icons/subjects.svg" alt="Subjects">
         <a href='?#' class="button">Subjects</a>
      </div>
      <div class="module__Links">
         <?php

         if (!isset($_GET['archive'])) {
            echo "   <a href='?add'><img src='drawables/icons/add.svg' alter='Add' />
            <span>Add</span>
            </a>";
            echo "<a href='?archive'><img src='drawables/icons/archive.svg' alter='Archive' />
            <span>Archive</span>
            </a>";
         } else {
            echo "<a class= 'module__Return' href='?'><img src='drawables/icons/return.svg'/>BACK</a>";
         }

         ?>
      </div>
   </div>
   <div class='module__Container'>
      <ul class='module__List module__Title'>
         <li class='module__Item'>Subject Code</li>
         <li class='module__Item'>Subject Description</li>
         <li class='module__Item'>Unit/s</li>
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
                           <form onsubmit='return submitForm(this)' action='./includes/subjects.inc.php' method='POST'>
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
      include_once './layouts/subjects.form.php';
   }
   ?>

</main>

<?php
include_once './layouts/__footer.php';
?>