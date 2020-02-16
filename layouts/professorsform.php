<?php
    $url = $_SERVER['REQUEST_URI'];
    $query = parse_url($url, PHP_URL_QUERY);
    parse_str($query,$errors);
?>

<form action='./includes/professors.inc.php' class='professors__Form' method='POST'>
   <a href="professors.php" class='form__Close'>X</a>
   <label for='formSelect' class='form__Title'>Professor's Information</label>
   <input class='form__Input' type='text' value='' name='employeeID' placeholder='Employee ID' required>
   <div class="form__Error"><?php echo $errors['employeeID'] ?? '' ?></div>
   <input class='form__Input' type='text' value='' name='lastName' placeholder='Last Name' required>
   <div class="form__Error"><?php echo $errors['lastName'] ?? '' ?></div>
   <input class='form__Input' type='text' value='' name='firstName' placeholder='First Name' required>
   <div class="form__Error"><?php echo $errors['firstName'] ?? '' ?></div>
   <input class='form__Input' type='text' value='' name='middleInitial' placeholder='M.I' >
   <div class="form__Error"><?php echo $errors['middleInitial'] ?? '' ?></div>
   <input class='form__Input' type='text' value='' name='suffix' placeholder='Suffix'>
   <div class="form__Error"><?php echo $errors['suffix'] ?? '' ?></div>
   <div>
      <label for='formSelect'>Department:</label>
      <select class='form__Select' name='deptID' id='formSelect'>
         <option class='form__Option' value='1'>BSIT</option>
         <option class='form__Option' value='2'>BSCS</option>
         <option class='form__Option' value='3'>BSCE</option>
         <option class='form__Option' value='4'>BSAT</option>
      </select>
   </div>
   <button class='form__Button' type='submit' name='submit'>SUBMIT</button>
</form>
<a href="professors.php" class='professors__formBackground'></a>