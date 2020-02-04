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
            for($i = 0; $i<sizeof($professors['firstName']);$i++){
               echo '<ul class="professors__List">
                  <li>'.$professors['firstName'][$i].'</li>
                  <li>'.$professors['lastName'][$i].'</li>
                  <li>'.$professors['deptName'][$i].'</li>
               </ul>';
            }
         ?>
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>