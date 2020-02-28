<?php
   include_once './layouts/__header.php';
?>
      
      <main class='professors module'>
         <div class="module__Header">
            <div></div>
            <img src="drawables/icons/professor.svg">
            <a href='?add' class='module__Add button'>ADD</a>
         </div>
         <div class='module__Container'>
            <ul class='module__List module__Title'>
               <li class='module__Item'> ID</li>
               <li class='module__Item'>Employee Name</li>
               <li class='module__Item'>Department</li>
               <li class='module__Item'></li>
               <li class='module__Item'></li>
               <li class='module__Item'></li>
            </ul>
            <?php
               $profView = new ProfessorsView();
               $profView->DisplayProfessors();
            ?>
         </div>
         <form class="form" action="includes/login.inc.php" method="POST">
      <div class="form__Message">
         <label class="form__Label">Sign in</label>
         <p class="form__Signin--display">as <span></span></p>
      </div>
      <div class="form__Groups">
         <div class="form__Group form__Signin--hide">
            <input type="text"  class="form__Field" placeholder="Username" id='username' name="username" >
            <label for='username' class="form__Label--placeholder">Username</label>
         </div>
         <div class="form__Group form__Signin--display">
            <input type="password" class="form__Field form__Signin--display" placeholder="Password" id='password'  name="password" autofocus>
            <label for="password" class="form__Label--placeholder form__Signin--display">Password</label>
         </div>
         <span class="form__Error"></span>
      </div>
      <button class="form__Button" type="submit" name="<?php echo $buttonName ?>">NEXT</button>
   </form>
         <?php
            //if(isset($_GET['add']) || isset($_GET['id'])){
               //include_once './layouts/professors.form.php';
            //}
         ?>
        
   
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>