<?php
include_once './layouts/__header.php';
$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
?>

<main class='rooms module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchRooms" placeholder="Search...">
         <input id="liveSearch--Status" type="hidden" name="searchState" value="<?php echo $state ?>">
      </form>
      <div class="module__Logo">
         <img src="drawables/icons/rooms.svg" alt="Subjects">
         <a href='?' class="button">Rooms<?php echo $subTitle ?></a>
      </div>
      <div class="module__Links">
         <?php

         if (!isset($_GET['archive'])) {
            echo "   <a href='?page=$page&add'><img src='drawables/icons/add.svg' alter='Add' />
            <span>Add</span>
            </a>";
            echo "<a href='?archive&page=1'><img src='drawables/icons/archive.svg' alter='Archive' />
            <span>Archive</span>
            </a>";
         } else {
            echo "<a class= 'module__Return' href='?page=1'><img src='drawables/icons/return.svg'/>BACK</a>";
         }

         ?>
      </div>
   </div>
   <div class='module__Container'>
      <?php

      $roomsView = new RoomsView();
      $results = $roomsView->FetchRoomsByState($state);
      $limit = 11;
      $pages = ceil(sizeof($results) / $limit);

      $paginatedResults = $roomsView->FetchRoomsByState($state, $page, $limit);
      $roomsView->DisplayRooms($paginatedResults, $page);

      ?>
   </div>
   <div class='module__Pages'>
      <?php

      if ($pages != 1) {
         for ($i = 1; $i <= $pages; $i++) {
            $activePage = ($_GET['page'] != $i) ? "" : "class='active'";
            echo "<a href='?page=$i' $activePage>$i</a>";
         }
      }

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