<?php

include_once './includes/autoloader.inc.php';
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $deptView = new DepartmentsView();
   $result = $deptView->FetchDeptByID($id);
   $dept = $result[0];
   $button = "update";
}

?>

<form action='./includes/departments.inc.php' class='module__Form' method='POST'>
   <section class="form__Close">
      <a href="?dept=<?php echo "$department&page=$page" ?>">X</a>
   </section>
   <label for='formSelect' class='form__Title'>Department's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $page ?>' name='page'>
   <input class='form__Input' type='hidden' value='<?php echo $dept['dept_id'] ?? '' ?>' name='id'>
   <input class='form__Input' type='hidden' value='<?php echo $department ?>' name='department'>
   <div class="form__Container">
      <label for='' class='form__Label'>Program:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $dept['dept_name'] ?? '' ?>' name='name' required>
         <div class="form__Error"><?php echo $errors['errorName'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Description:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $dept['dept_desc'] ?? '' ?>' name='desc' required>
         <div class="form__Error"><?php echo $errors['errorDesc'] ?? '' ?></div>
      </div>
   </div>
   <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="?dept=<?php echo "$department&page=$page" ?>" class='module__formBackground'></a>