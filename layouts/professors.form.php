<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
if (isset($_GET['id']) && !empty($_GET['id'])) {
   $id = $_GET['id'];
   $profView = new ProfessorsView();
   $result = $profView->FetchProfessorByID($id);
   $prof = $result[0];
   $button = "update";
}
$empID = (!empty($_GET['empID'])) ? $_GET['empID'] : $prof['emp_no'];
$firstName = (!empty($_GET['firstName'])) ? $_GET['firstName'] : $prof['first_name'];
$lastName = (!empty($_GET['lastName'])) ? $_GET['lastName'] : $prof['last_name'];
$middleName = (!empty($_GET['middleInitial'])) ? $_GET['middleInitial'] : '';
$suffix = (!empty($_GET['suffix'])) ? $_GET['suffix'] : $prof['suffix'];
$username = (!empty($_GET['username'])) ? $_GET['username'] : $prof['username'];
$email = (!empty($_GET['email'])) ? $_GET['email'] : $prof['email'];
?>

<form action='./includes/professors.inc.php' class='module__Form' method='POST' enctype="multipart/form-data">
   <a href="professors.php" class='form__Close'>X</a>
   <label class='form__Title'>Professor's Information</label>
   <input type='hidden' value='<?php echo $prof['id'] ?? '' ?>' name='profID'>
   <input type='hidden' value='<?php echo $prof['user_id'] ?? '' ?>' name='userID'>
   <div class="form__Container">
      <label for='' class='form__Label'>Employee ID:</label>
      <div class="form__Input">
         <input id="empID" type='text' value='<?php echo $empID ?? '' ?>' name='empID' required>
         <div class="form__Error"><?php echo $errors['errorEmpID'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Name:</label>
      <div class="form__Input">
         <input class='name' type='text' value='<?php echo $firstName ?? '' ?>' name='firstName' placeholder='First Name' required>
         <input class='name' type='text' value='<?php echo $lastName ?? '' ?>' name='lastName' placeholder='Last Name' required>
         <input class='name--short' type='text' value='<?php echo $middleName ?? '' ?>' name='middleInitial' placeholder='M.I'>
         <input class='name--short' type='text' value='<?php echo $suffix ?? '' ?>' name='suffix' placeholder='Suffix'>
         <div class="form__Error"><?php echo $errors['errorFirstname'] ?? '' ?></div>
         <div class="form__Error"><?php echo $errors['errorLastname'] ?? '' ?></div>
         <div class="form__Error"><?php echo $errors['errorMiddlename'] ?? '' ?></div>
         <div class="form__Error"><?php echo $errors['errorSuffix'] ?? '' ?></div>
         <div></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Username:</label>
      <div class="form__Input">
         <input id="userName" type='text' value='<?php echo $username ?? '' ?>' name='username' required>
         <div class="form__Error"><?php echo $errors['errorUserame'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label class='form__Label'>Email:</label>
      <div class="form__Input">
         <input type='text' value='<?php echo $email ?? '' ?>' name='email'>
         <div class="form__Error"><?php echo $errors['errorEmail'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Department:</label>
      <div class="form__Input">
         <select name='deptID' id='formSelect'>
            <?php
            $deptView = new DepartmentsView();
            $departments = $deptView->FetchDepts("Faculty", 1);
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