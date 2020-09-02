<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
$errorName = $errors['errorName'] ?? '';


if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
var_dump($checkList);
?>

<form action='./includes/checklist.inc.php' class='module__Form' method='POST'>
  <section class="form__Title">
    <label>Add Subjects Information</label>
    <a href="??id=<?php echo $checkList['id'] ?>">X</a>
  </section>

  <div class="form__Container">
    <label for='' class='form__Label'>Select Subject:</label>
    <div class="form__Input">
      <select>
        <?php

        $subjView = new SubjectsView();
        $subjects = $subjView->FetchSubjectsByState(1);
        foreach ($subjects as $subject) {
          echo "<option value='{$subject['subj_id']}'><span>{$subject['subj_code']}</span> | <span>{$subject['subj_desc']}</span></option>";
        }

        ?>
      </select>
    </div>
  </div>
  <div class="form__Container">
    <label for='' class='form__Label'>Year:</label>
    <div class="form__Input">
      <select>
        <?php

        $levels = $checklistView->FetchLevel($checkList['dept_type']);
        foreach ($levels as $level) {
          echo "<option value='{$level['id']}'>{$level['description']}</option>";
        }

        ?>
      </select>
    </div>
  </div>
  <button class='form__Button button' type='submit' name='<?php echo $button ?>'><?php echo $button ?></button>
</form>
<a href="?id=<?php echo $checkList['id'] ?>" class='module__formBackground'></a>