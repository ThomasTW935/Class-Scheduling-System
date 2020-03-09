<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $result = $sectView->FetchSectionByID($id);
   $sect = $result[0];
   $button = "update";
}
?>

<form action='./includes/subjects.inc.php' class='module__Form' method='POST'>
   <a href="sections.php" class='form__Close'>X</a>
   <label for='formSelect' class='form__Title'>Section's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $sect['sect_id'] ?? '' ?>' name='sectID'>
   <div class="form__Container">
      <label for='' class='form__Label'>Code:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $sect['sect_code'] ?? '' ?>' name='name' placeholder='Subject Code' required>
         <div class="form__Error"><?php echo $errors['errorCode'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Description:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $sect['sect_desc'] ?? '' ?>' name='desc' placeholder='Subject Description' required>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Year Level:</label>
      <div class="form__Input">
         <input class='form__Input' type='number' value='<?php echo $sect['sect_year'] ?? '' ?>' name='year' placeholder='Year' required>
         <div class="form__Error"><?php echo $errors['units'] ?? '' ?></div>
      </div>
   </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Semester:</label>
      <div class="form__Input">
         <input class='form__Input' type='number' value='<?php echo $sect['sect_sem'] ?? '' ?>' name='sem' placeholder='Semester' required>
         <div class="form__Error"><?php echo $errors['units'] ?? '' ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Department:</label>
      <div class="form__Input">
         <select name='deptID' id='formSelect'>
            <?php
            $deptView = new DepartmentsView();
            $departments = $deptView->FetchDepts("strand", 1);
            foreach ($departments as $dept) {
               $selected = ($prof['dept_id'] == $dept['dept_id']) ? 'selected' : '';
               echo "<option class='form__Option' value='" . $dept['dept_id'] . "' " . $selected . ">" . $dept['dept_name'] . "</option>";
            }

            ?>
         </select>
      </div>
   </div>
   
   <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="sections.php" class='module__formBackground'></a>