<?php
   include_once './includes/autoloader.inc.php';
   $url = $_SERVER['REQUEST_URI'];
   $query = parse_url($url, PHP_URL_QUERY);
   $button = "submit";
   parse_str($query,$errors);
   if(isset($_GET['id'])){
      $id = $_GET['id'];
      $deptView = new DepartmentsView();
      $result = $deptView->FetchDeptFacultyByID($id);
      $dept = $result[0];
      $button = "update";
   }    
?>

<form action='./includes/department.inc.php' class='module__Form' method='POST'>
   <a href="facultydepartment.php" class='form__Close'>X</a>
   <label for='formSelect' class='form__Title'>Department's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $dept['id'] ?? '' ?>' name='id'>
   <input class='form__Input' type='text' value='<?php echo $dept['dept_name'] ?? '' ?>' name='deptName' placeholder='Name' required>
   <div class="form__Error"><?php echo $errors['dept_name'] ?? '' ?></div>
   <input class='form__Input' type='text' value='<?php echo $dept['dept_desc'] ?? '' ?>' name='deptDesc' placeholder='Description' required>
   <div class="form__Error"><?php echo $errors['dept_desc'] ?? '' ?></div>
   <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="facultydepartment.php" class='module__formBackground'></a>