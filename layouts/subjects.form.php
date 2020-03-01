<?php
   include_once './includes/autoloader.inc.php';
   $url = $_SERVER['REQUEST_URI'];
   $query = parse_url($url, PHP_URL_QUERY);
   $button = "submit";
   parse_str($query,$errors);
   if(isset($_GET['id'])){
      $id = $_GET['id'];
      $result = $subjView->FetchSubjectByID($id);
      $subj = $result[0];
      $button = "update";
   }    
?>

<form action='./includes/subjects.inc.php' class='module__Form' method='POST'>
   <a href="subjects.php" class='form__Close'>X</a>
   <label for='formSelect' class='form__Title'>Subject's Information</label>
   <input class='form__Input' type='hidden' value='<?php echo $subj['subj_id'] ?? '' ?>' name='id'>
   <input class='form__Input' type='text' value='<?php echo $subj['subj_code'] ?? '' ?>' name='code' placeholder='Subject Code'  required>
   <div class="form__Error"><?php echo $errors['subjectCode'] ?? '' ?></div>
   <input class='form__Input' type='text' value='<?php echo $subj['subj_desc'] ?? '' ?>' name='desc' placeholder='Subject Description' required>
   <input class='form__Input' type='number' value='<?php echo $subj['units'] ?? '' ?>' name='units' placeholder='Units'  required>
   <div class="form__Error"><?php echo $errors['units'] ?? '' ?></div>
   <button class='form__Button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="subjects.php" class='module__formBackground'></a>