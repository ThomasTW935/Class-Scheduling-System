<?php

   include_once './includes/autoloader.inc.php';
   $query = parse_url($url, PHP_URL_QUERY);
   $button = "submit";
   parse_str($query,$errors);
   if(isset($_GET['id'])){
      $id = $_GET['id'];
      $deptView = new DepartmentsView();
      $result = $deptView->FetchDeptByID($id);
      $deptRe = $result[0];
      $button = "update";
   }
   
?>

<form action='./includes/departments.inc.php' class='module__Form' method='POST'>
   <a href="<?php echo $path ?>" class='form__Close'>X</a>
   <label for='formSelect' class='form__Title'>Department's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $deptRe['dept_id'] ?? '' ?>' name='id'>
   <input class='form__Input' type='hidden' value='<?php echo $department ?>' name='department'>
   <input class='form__Input' type='text' value='<?php echo $deptRe['dept_name'] ?? '' ?>' name='name' placeholder='Name' required>
   <div class="form__Error"><?php echo $errors['name'] ?? '' ?></div>
   <input class='form__Input' type='text' value='<?php echo $deptRe['dept_desc'] ?? '' ?>' name='desc' placeholder='Description' required>
   <div class="form__Error"><?php echo $errors['desc'] ?? '' ?></div>
   <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="<?php echo $path ?>" class='module__formBackground'></a>