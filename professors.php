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
            <form action="./includes/professors.inc.php" class="professors__Form" method="POST">
               <label for="formSelect" class="form__Title">Professor's Information</label>
               <input class="form__Input" type="text" name="employeeID" placeholder="Employee ID">
               <input class="form__Input" type="text" name="lastName" placeholder="Last Name">
               <input class="form__Input" type="text" name="firstName" placeholder="First Name">
               <input class="form__Input" type="text" name="middleInitial" placeholder="M.I">
               <input class="form__Input" type="text" name="suffix" placeholder="Suffix">
               <div>
                  <label for="formSelect">Department:</label>
                  <select class="form__Select" name="deptName" id="formSelect">
                     <option class="form__Option" value="1">BSIT</option>
                     <option class="form__Option" value="2">BSCS</option>
                     <option class="form__Option" value="3">BSCE</option>
                     <option class="form__Option" value="4">BSAT</option>
                  </select>
               </div>
               <button class="form__Button" type="submit" name="submit">Submit</button>
            </form>
            <div class="form__Background"></div>
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>