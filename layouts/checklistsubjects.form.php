<?php
include_once './includes/autoloader.inc.php';
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
$button = "submit";
parse_str($query, $errors);
$errorName = $errors['errorName'] ?? '';


$subjID  = '';
$levelID  = '';
$buttonName = 'add';
$stcID = '';
if (isset($_GET['stcid'])) {
  $stcID = $_GET['stcid'];
  $stcResult = $checklistView->FetchCheclistSubject($stcID)[0];
  $subjID  = $stcResult['subj_id'];
  $levelID  = $stcResult['level_id'];
  $buttonName = 'update';
}
?>

<form action='./includes/checklistsubjects.inc.php' class='module__Form' method='POST'>
  <section class="form__Title">
    <label>Add Subjects To Checklist</label>
    <a href="?id=<?php echo $id ?>">X</a>
  </section>
  <input type="hidden" name="chkID" value='<?php echo $id ?>'>
  <input type="hidden" name="stcID" value='<?php echo $stcID ?>'>
  <div class="form__Container">
    <label for='' class='form__Label'>Select Subject:</label>
    <div class="form__Input">
      <select name='subjID'>
        <?php

        $subjView = new SubjectsView();
        $subjects = $subjView->FetchSubjectsByState(1);
        foreach ($subjects as $subject) {
          $selOpt = ($subjID  == $subject['subj_id']) ? "selected" : "";
          echo "<option value='{$subject['subj_id']}' $selOpt><span>{$subject['subj_code']}</span> | <span>{$subject['subj_desc']}</span></option>";
        }

        ?>
      </select>
    </div>
  </div>
  <div class="form__Container">
    <label for='' class='form__Label'>Year:</label>
    <div class="form__Input">
      <select name='levelID'>
        <?php

        $levels = $checklistView->FetchLevel($checkList['dept_type']);
        foreach ($levels as $level) {
          $selOpt = ($levelID  == $level['id']) ? "selected" : "";
          echo "<option value='{$level['id']}' $selOpt>{$level['description']}</option>";
        }

        ?>
      </select>
    </div>
  </div>

  <?php

  echo "<button class='form__Button button' type='submit' name='$buttonName-subject'>$buttonName Subject</button>";

  ?>

</form>
<a href="?id=<?php echo $id ?>" class='module__formBackground'></a>