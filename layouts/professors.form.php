<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
$empID = (!empty($errors['empID'])) ? $errors['empID'] : '';
$firstName = (!empty($errors['firstName'])) ? $errors['firstName'] : '';
$lastName = (!empty($errors['lastName'])) ? $errors['lastName'] : '';
$middleName = (!empty($errors['middleInitial'])) ? $errors['middleInitial'] : '';
$suffix = (!empty($errors['suffix'])) ? $errors['suffix'] : '';
$username = (!empty($errors['username'])) ? $errors['username'] : '';
$email = (!empty($errors['email'])) ? $errors['email'] : '';

$errorEmpID       = (!empty($errors['errorEmpID'])) ? $errors['errorEmpID'] : '';
$errorFirstName   = (!empty($errors['errorFirstname'])) ? $errors['errorFirstname'] : '';
$errorLastName    = (!empty($errors['errorLastname'])) ? $errors['errorLastname'] : '';
$errorMiddleName  = (!empty($errors['errorMiddlename'])) ? $errors['errorMiddlename'] : '';
$errorSuffix      = (!empty($errors['errorSuffix'])) ? $errors['errorSuffix'] : '';
$errorUsername    = (!empty($errors['errorUsername'])) ? $errors['errorUsername'] : '';
$errorEmail       = (!empty($errors['errorEmail'])) ? $errors['errorEmail'] : '';
if (isset($_GET['id']) && !empty($_GET['id'])) {
   $id = $_GET['id'];
   $profView = new ProfessorsView();
   $result = $profView->FetchProfessorByID($id);
   $prof = $result[0];
   $profID = $prof['id'];
   $userID = $prof['user_id'];
   $button = "update";
   $empID =  $prof['emp_no'];
   $firstName =  $prof['first_name'];
   $lastName =  $prof['last_name'];
   $middleName = $prof['middleInitial'];
   $suffix =  $prof['suffix'];
   $username =  $prof['username'];
   $email =  $prof['email'];
}
?>

<form action='./includes/professors.inc.php' class='module__Form' method='POST' enctype="multipart/form-data">
   <section class='form__Close'>
      <a href="professors.php">X</a>
   </section>
   <label class='form__Title'>Professor's Information</label>
   <input type='hidden' value='<?php echo $profID ?? '' ?>' name='profID'>
   <input type='hidden' value='<?php echo $userID ?? '' ?>' name='userID'>
   <div class="form__Container">
      <label for='' class='form__Label'>Employee ID:</label>
      <div class="form__Input">
         <input id="empID" type='text' value='<?php echo $empID ?? '' ?>' name='empID' required>
         <div class="form__Error"><?php echo $errorEmpID ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Name:</label>
      <div class="form__Input">
         <input class='name' type='text' value='<?php echo $firstName ?? '' ?>' name='firstName' placeholder='First Name' required>
         <input class='name' type='text' value='<?php echo $lastName ?? '' ?>' name='lastName' placeholder='Last Name' required>
         <input class='name--short' type='text' value='<?php echo $middleName ?? '' ?>' name='middleInitial' placeholder='M.I'>
         <input class='name--short' type='text' value='<?php echo $suffix ?? '' ?>' name='suffix' placeholder='Suffix'>
         <div class="form__Error"><?php echo $errorFirstName ?></div>
         <div class="form__Error"><?php echo $errorLastName ?></div>
         <div class="form__Error"><?php echo $errorMiddleName ?></div>
         <div class="form__Error"><?php echo $errorSuffix ?></div>
         <div></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Username:</label>
      <div class="form__Input">
         <input id="userName" type='text' value='<?php echo $username ?? '' ?>' name='username' required>
         <div class="form__Error"><?php echo $errorUsername ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label class='form__Label'>Email:</label>
      <div class="form__Input">
         <input type='text' value='<?php echo $email ?? '' ?>' name='email'>
         <div class="form__Error"><?php echo $errorEmail ?></div>
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