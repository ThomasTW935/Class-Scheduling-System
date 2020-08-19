<?php

include_once './includes/autoloader.inc.php';
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);

$errorName = $errors['errorName'] ?? '';
$errorDesc = $errors['errorDesc'] ?? '';

$deptID = '';
$name = $errors['name'] ?? '';
$desc = $errors['desc'] ?? '';
if (isset($_GET['id'])) {
   $deptID = $_GET['id'];
   $deptView = new DepartmentsView();
   $result = $deptView->FetchDeptByID($deptID);
   $dept = $result[0];
   $button = "update";
   $name = $dept['dept_name'];
   $desc = $dept['dept_desc'];
}

?>

<form action='./includes/departments.inc.php' class='module__Form' method='POST'>
   <section class="form__Close">
      <a href="?dept=<?php echo "$department&page=$page" ?>">X</a>
   </section>
   <label for='formSelect' class='form__Title'>Department's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $page ?>' name='page'>
   <input class='form__Input' type='hidden' value='<?php echo $deptID ?>' name='deptID'>
   <input class='form__Input' type='hidden' value='<?php echo $department ?>' name='department'>
   <div class="form__Container">
      <label for='' class='form__Label'>Program:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $name ?>' name='name' required>
         <div class="form__Error"><?php echo $errorName ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for='' class='form__Label'>Description:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $desc ?>' name='desc' required>
         <div class="form__Error"><?php echo $errorDesc ?></div>
      </div>
   </div>
   <button class='form__Button button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="?dept=<?php echo "$department&page=$page" ?>" class='module__formBackground'></a>