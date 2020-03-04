<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $profView = new ProfessorsView();
   $result = $profView->FetchProfessorByID($id);
   $prof = $result[0];
   $button = "update";
}
?>

<form action='./includes/professors.inc.php' class='module__Form' method='POST' enctype="multipart/form-data">
   <a href="professors.php" class='form__Close'>X</a>
   <label class='form__Title'>Professor's Information</label>
   <input type='hidden' value='<?php echo $prof['id'] ?? '' ?>' name='id'>
   <div class="form__Container">
      <label for='' class='form__Label'>Employee ID:</label>
      <div class="form__Input">
         <input id="empID" type='text' value='<?php echo $prof['emp_no'] ?? '' ?>' name='employeeID' placeholder='Employee ID' maxlength="8" required>
         <div class="form__Error"><?php echo $errors['employeeID'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Name:</label>
      <div class="form__Input">
         <input class='name' type='text' value='<?php echo $prof['first_name'] ?? '' ?>' name='firstName' placeholder='First Name' required>
         <input class='name' type='text' value='<?php echo $prof['last_name'] ?? '' ?>' name='lastName' placeholder='Last Name' required>
         <input class='name--short' type='text' value='<?php echo $prof['middle_name'] ?? '' ?>' name='middleName' placeholder='M.I' required>
         <input class='name--short' type='text' value='<?php echo $prof['suffix'] ?? '' ?>' name='suffix' placeholder='Suffix'>
         <div class="form__Error"><?php echo $errors['name'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Username:</label>
      <div class="form__Input">
         <input id="userName" type='text' value='<?php echo $prof['username'] ?? '' ?>' name='username' placeholder='Username'>
         <div class="form__Error"><?php echo $errors['username'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label class='form__Label'>Email:</label>
      <div class="form__Input">
         <input type='text' value='<?php echo $prof['email'] ?? '' ?>' name='email' placeholder='Email'>
         <div class="form__Error"><?php echo $errors['email'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Department:</label>
      <div class="form__Input">
         <select name='deptID' id='formSelect'>
            <?php
            $deptView = new DepartmentsView();
            $departments = $deptView->FetchDepts("Faculty");
            foreach ($departments as $dept) {
               $selected = ($prof['dept_id'] == $dept['dept_id']) ? 'selected' : '';
               echo "<option class='form__Option' value='" . $dept['dept_id'] . "' " . $selected . ">" . $dept['dept_name'] . "</option>";
            }

            ?>
         </select>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Select Image:</label>
      <div class="form__Input">
         <input id='image' type='file' value='<?php echo $prof['username'] ?? '' ?>' name='image' accept="image/*">
      </div>
   </div>
   <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="professors.php" class='module__formBackground'></a>