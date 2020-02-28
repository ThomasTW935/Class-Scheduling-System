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
               <li class='module__Item'>Employee ID</li>
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
         <?php
            //if(isset($_GET['add']) || isset($_GET['id'])){
               //include_once './layouts/professors.form.php';
            //}
         ?>
         <form action='./includes/professors.inc.php' class='module__Form' method='POST' enctype="multipart/form-data">
   <a href="professors.php" class='form__Close'>X</a>
   <label for='formSelect' class='form__Title'>Professor's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $prof['id'] ?? '' ?>' name='id'>
   <input id="empID" class='form__Input' type='text' value='<?php echo $prof['emp_no'] ?? '' ?>' name='employeeID' placeholder='Employee ID' maxlength="8" required>
   <div class="form__Error"><?php echo $errors['employeeID'] ?? '' ?></div>
   <input class='form__Input' type='text' value='<?php echo $prof['last_name'] ?? '' ?>' name='lastName' placeholder='Last Name' required>
   <div class="form__Error"><?php echo $errors['lastName'] ?? '' ?></div>
   <input class='form__Input' type='text' value='<?php echo $prof['first_name'] ?? '' ?>' name='firstName' placeholder='First Name' required>
   <div class="form__Error"><?php echo $errors['firstName'] ?? '' ?></div>
   <input class='form__Input' type='text' value='<?php echo $prof['middle_initial'] ?? '' ?>' name='middleInitial' placeholder='M.I' >
   <div class="form__Error"><?php echo $errors['middleInitial'] ?? '' ?></div>
   <input class='form__Input' type='text' value='<?php echo $prof['suffix'] ?? '' ?>' name='suffix' placeholder='Suffix'>
   <div class="form__Error"><?php echo $errors['suffix'] ?? '' ?></div>
   <input id="userName" class='form__Input' type='text' value='<?php echo $prof['username'] ?? '' ?>' name='username' placeholder='Username'>
   <div class="form__Error"><?php echo $errors['username'] ?? '' ?></div>
   
   <div>
      <label for='formSelect'>Department:</label>
      <select class='form__Select' name='deptID' id='formSelect'>
         <?php
            $deptView = new DepartmentsView();
            $departments = $deptView->FetchDepts("Faculty");
            foreach($departments as $dept){
               $selected = ($prof['dept_id'] == $dept['dept_id']) ? 'selected' : '';
               echo "<option class='form__Option' value='". $dept['dept_id'] ."' ". $selected .">". $dept['dept_name'] ."</option>";
            }

         ?>
      </select>
   </div>
   <input class='form__Input' type='file' value='<?php echo $prof['username'] ?? '' ?>' name='image' accept="image/*">
   <div class="form__Error"><?php echo $errors['image'] ?? '' ?></div>
   <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="professors.php" class='module__formBackground'></a>
   
      </main>
      
<?php
   include_once './layouts/__footer.php';
?>