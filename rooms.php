<?php
   include_once './layouts/__header.php';

   
?>

<main class="rooms">
   <fieldset class="rooms__Floor">
      <legend>Ground Floor</legend>
         <a class="rooms__Card card__Design" href="./rooms.php">
            <h1>101</h1>
            <h3>laboratory</h3>
         </a>
         <a class="rooms__Card card__Design" href="./rooms.php">
            <h1>102</h1>
            <h3>kitchen</h3>
         </a>
   </fieldset>
   
   <?php
      $floors = ['Second Floor','Third Floor'];
      $count = 201;
      foreach($floors as $floor){
         echo '<fieldset class="rooms__Floor">
                  <legend>'.$floor.'</legend>';
         for($i = 1; $i <= 11; $i++){
            echo '<a class="rooms__Card card__Design" href="./rooms.php">
                     <h1>'.$count.'</h1>
                     <h3>classroom</h3>
                  </a>';
            $count++;
         }
         $count = 301;
         echo '</fieldset>';
      }
   ?>
</main>

<?php
   include_once './layouts/__footer.php';
?>