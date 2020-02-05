<?php
   include_once './layouts/__header.php';

   $professors = [
      'firstName' => ['Daryl','Christine','Hushuaia','Princess'],
      'lastName' => ['Thomas','Aparato','De Peralta','Legarde'],
      'deptName' => ['BSIT','BSCS','BSCE','BSAT']
   ]

?>
      
      <main class="professors">
         <?php

            echo '<ul class="professors__List professors__Title">';
            foreach($professors as $key => $value){
               echo '<li>'.$key.'</li>';
            }
            echo '<li></li>';
            echo '</ul>';
            for($i = 0; $i<sizeof($professors['firstName']);$i++){
               echo '<ul class="professors__List">
                  <li class="professors__Item">'.$professors['firstName'][$i].'</li>
                  <li class="professors__Item">'.$professors['lastName'][$i].'</li>
                  <li class="professors__Item">'.$professors['deptName'][$i].'</li>
                  <a href="?update&id='.$i.'" class="">Update</a>
               </ul>';
            }
            ?>
            <a href="?add" class="professors__Add form__Redirect">+</a>
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>