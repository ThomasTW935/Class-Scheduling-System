<?php
include_once './layouts/__header.php';
$state = isset($_GET['archive']) ? 0 : 1;
$subTitle = isset($_GET['archive']) ? '(Archive)' : '';
$searchValue = $_GET['q'] ?? '';
?>

<main class='rooms module'>
   <div class="module__Header">
      <form class="liveSearch__Form">
         <input id="liveSearch" type="search" name="searchRooms" placeholder="Search..." value='<?php echo $searchValue ?>'>
         <input id="liveSearch--Status" type="hidden" name="searchState" value="<?php echo $state ?>">
         <input id="liveSearch--Page" type="hidden" name="searchPage" value="<?php echo $page ?>">
      </form>
      <div class="module__Logo">
         <img src="drawables/icons/rooms.svg" alt="Subjects">
         <a href='?' class="button">Rooms<?php echo $subTitle ?></a>
      </div>
      <div class="module__Links">
         <?php

         $func->GenerateModuleLinks($page);

         ?>
      </div>
   </div>
   <div class='module__Content'>
      <?php

      if (empty($searchValue)) {
         $roomsView = new RoomsView();
         $results = $roomsView->FetchRoomsByState($state);

         $isArchived = isset($_GET['archive']);
         $table = $func->TableProperties('room', $results, $isArchived);
         $paginatedResults = $roomsView->FetchRoomsByState($state, $page, $table['limit']);
         $roomsView->DisplayRooms($paginatedResults, $page, $table['totalpages'], $table['destination']);
      }

      ?>
      <iframe src="./reports.php?rooms" frameborder="0" id='iframe' name='iframe'></iframe>
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