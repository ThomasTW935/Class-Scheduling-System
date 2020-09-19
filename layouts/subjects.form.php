<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);

$errorCode = $errors['errorCode'] ?? '';

$subjID = '';
$code = $errors['code'] ?? '';
$desc = $errors['desc'] ?? '';
$units = $errors['units'] ?? '1';
$hours = $errors['hours'] ?? '';
$type = $errors['type'] ?? '0';
$deptID = $errors['deptID'] ?? '';
if (isset($_GET['id'])) {
   $subjID = $_GET['id'];
   $result = $subjView->FetchSubjectByID($subjID);
   $subj = $result[0];
   $button = "update";
   $code = $subj['subj_code'];
   $desc = $subj['subj_desc'];
   $hours = $subj['hours'];
   $units = $subj['units'];
   $deptID = $subj['dept_id'];
   $type = $subj['is_laboratory'];
}
?>

<form action='./includes/subjects.inc.php' class='module__Form' method='POST'>
   <section class="form__Title">
      <label for='formSelect' class='form__Title'>Subject's Information</label>
      <a href="subjects.php?page=<?php echo $page ?>">X</a>
   </section>
   <input class='form__Input' type='hidden' value='<?php echo $page ?>' name='page'>
   <input class='form__Input' type='hidden' value='<?php echo $subjID ?>' name='subjID'>

   <div class="form__Container">
      <label for='' class='form__Label'>Code:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $code ?>' name='code' required>
         <div class="form__Error"><?php echo $errorCode ?></div>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Description:</label>
      <div class="form__Input">
         <input class='form__Input' type='text' value='<?php echo $desc ?>' name='desc' required>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Unit/s:</label>
      <div class="form__Input">
         <input class='form__Input' type='number' value='<?php echo $units ?>' min='1' name='units' required>
      </div>
   </div>
   <div class="form__Container">
      <label for="hours" class="form__Label">Hour/s:</label>
      <div class="form__Input">
         <select name="hours" id="hours">
            <?php

            $optsHour = [1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5];
            foreach ($optsHour as $opt) {
               $selOpt = ($opt == $hours) ? "selected" : "";
               echo "<option value='$opt' $selOpt>$opt hour/s</option>";
            }

            ?>
         </select>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Type:</label>
      <div class="">
         <?php

         $types = ["Lecture", "Laboratory"];
         for ($i = 0; $i < sizeof($types); $i++) {
            $selOpt = ($type == $i) ? 'checked' : '';
            echo "<input type='radio' name='type' id='$types[$i]' value='$i' $selOpt>";
            echo "<label for='$types[$i]'>$types[$i]</label>";
         }

         ?>
      </div>
   </div>
   <div class="form__Container">
      <label for="" class="form__Label">Department:</label>
      <div class="form__Input">
         <select name='deptID'>
            <?php

            $deptView = new DepartmentsView();
            $departments = $deptView->FetchDepts('faculty', 1);
            foreach ($departments as $department) {
               $selOpt = ($deptID == $department['dept_id']) ? 'selected' : '';
               echo "<option value='{$department['dept_id']}' $selOpt>{$department['dept_name']}</option>";
            }

            ?>
         </select>
      </div>
   </div>
   <button class='form__Button button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="subjects.php?page=<?php echo $page ?>" class='module__formBackground'></a>