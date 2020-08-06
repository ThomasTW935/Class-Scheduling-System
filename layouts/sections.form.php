<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);

$errorName = $errors['errorName'] ?? '';

$sectID  = '';
$name    = '';
$year    = $errors['year'] ?? '';
$sem     = $errors['sem'] ?? '';
$deptID  = $errors['deptID'] ?? '';
if (isset($_GET['id'])) {
   $id      = $_GET['id'];
   $result  = $sectView->FetchSectionByID($id);
   $sect    = $result[0];
   $button  = "update";
   $sectID  = $sect['sect_id'];
   $name    = $sect['sect_name'];
   $year    = $sect['sect_year'];
   $sem     = $sect['sect_sem'];
   $deptID  = $sect['dept_id'];
}
?>

<form action='./includes/sections.inc.php' class='module__Form' method='POST'>
   <section class="form__Close">
      <a href='sections.php?page=<?php echo $page ?>'>X</a>
   </section>
   <label for='formSelect' class='form__Title'>Section's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $page ?>' name='page'>
   <input class='form__Input' type='hidden' value='<?php echo $sectID ?>' name='sectID'>
   <div class='form__Container'>
      <label for='' class='form__Label'>Section:</label>
      <div class='form__Input'>
         <input class='form__Input' type='text' value='<?php echo $name ?>' name='name' required>
         <div class='form__Error'><?php echo $errorName ?></div>
      </div>
   </div>
   <div class='form__Container'>
      <label for='' class='form__Label'>Year Level:</label>
      <div class='form__Input'>
         <input class='form__Input' type='number' value='<?php echo $year ?>' name='year' required>
      </div>
   </div>
   <div class='form__Container'>
      <label for='' class='form__Label'>Semester:</label>
      <div class='form__Input'>
         <input class='form__Input' type='number' value='<?php echo $sem ?>' name='sem' required>
      </div>
   </div>
   <div class='form__Container'>
      <label for='formSelect' class='form__Label'>Department:</label>
      <div class='form__Input'>
         <select name='deptID' id='formSelect'>
            <?php
            $deptView = new DepartmentsView();
            $departments = $deptView->FetchDepts('course', 1);
            foreach ($departments as $dept) {
               $selected = ($deptID != $dept['dept_id']) ? '' : 'selected';
               echo "<option class='form__Option' value='{$dept['dept_id']} ' {$selected}>{$dept['dept_name']}</option>";
            }
            ?>
         </select>
      </div>
   </div>
   <button class='form__Button' type='submit' name='<?php echo $button ?>'> <?php echo $button ?> </button>

</form>
<a href=" sections.php?page=<?php echo $page ?>" class='module__formBackground'></a>