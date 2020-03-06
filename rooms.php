<?php
include_once './layouts/__header.php';
$state = isset($_GET['archive']) ? 0 : 1;
?>

<main class='rooms module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchRooms" placeholder="Search...">
         <input id="liveSearch--Status" type="hidden" name="status" value="<?php echo $state ?>">
      </form>
      <div class="module__Logo">
         <img src="drawables/icons/subjects.svg" alt="Subjects">
         <a href='?#' class="button">Rooms</a>
      </div>
      <div class="module__Links">
         <a href='?add' class='module__Add button'>ADD</a>
         <a href='?archive' class='module__Archive button'>Archive</a>
      </div>
   </div>
   <div class='module__Container'>
      <?php

      $roomsView = new RoomsView();
      $results = $roomsView->FetchRoomsByState($state);
      $roomsView->DisplayRooms($results);

      ?>
   </div>
   <?php
   if (isset($_GET['add']) || isset($_GET['id'])) {
      include_once './layouts/rooms.form.php';
   }
   ?>

</main>

<?php
include_once './layouts/__footer.php';
?>