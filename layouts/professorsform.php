<?php
   include_once './includes/autoloader.inc.php';
   $url = $_SERVER['REQUEST_URI'];
   $query = parse_url($url, PHP_URL_QUERY);
   $button = "submit";
   parse_str($query,$errors);
   if(isset($_GET['id'])){
      $id = $_GET['id'];
      $profView = new ProfessorsView();
      $result = $profView->FetchProfessorByID($id);
      $prof = $result[0];
      $button = "update";
   }    
?>

<form action='./includes/professors.inc.php' class='module__Form' method='POST'>
   <a href="professors.php" class='form__Close'>X</a>
   <label for='formSelect' class='form__Title'>Professor's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $prof['id'] ?? '' ?>' name='id'>
   <input class='form__Input' type='text' value='<?php echo $prof['emp_no'] ?? '' ?>' name='employeeID' placeholder='Employee ID'  required>
   <div class="form__Error"><?php echo $errors['employeeID'] ?? '' ?></div>
   <input class='form__Input' type='text' value='<?php echo $prof['last_name'] ?? '' ?>' name='lastName' placeholder='Last Name' required>
   <div class="form__Error"><?php echo $errors['lastName'] ?? '' ?></div>
   <input class='form__Input' type='text' value='<?php echo $prof['first_name'] ?? '' ?>' name='firstName' placeholder='First Name' required>
   <div class="form__Error"><?php echo $errors['firstName'] ?? '' ?></div>
   <input class='form__Input' type='text' value='<?php echo $prof['middle_initial'] ?? '' ?>' name='middleInitial' placeholder='M.I' >
   <div class="form__Error"><?php echo $errors['middleInitial'] ?? '' ?></div>
   <input class='form__Input' type='text' value='<?php echo $prof['suffix'] ?? '' ?>' name='suffix' placeholder='Suffix'>
   <div class="form__Error"><?php echo $errors['suffix'] ?? '' ?></div>
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
   <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="professors.php" class='module__formBackground'></a>