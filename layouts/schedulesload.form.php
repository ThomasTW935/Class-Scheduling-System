<?php

include_once './includes/autoloader.inc.php';

$location = $_SERVER['HTTP_REFERER'];

?>

<form action='./includes/schedules.inc.php' class='module__Form' method='POST'>
  <a href="<?php echo $location ?>" class='form__Close'>X</a>
  <label class='form__Title'>Professor's Information</label>
  <input type='hidden' value='<?php echo $prof['id'] ?? '' ?>' name='profID'>
  <input type='hidden' value='<?php echo $prof['user_id'] ?? '' ?>' name='userID'>
  <div class="form__RadioContainer">
    <div class="form__RadioGroup">
      <input class='form__Radio' type="radio" name="radio" id="section" value='Sections' checked='checked'>
      <label for="section">Sections</label>
    </div>
    <div class="form__RadioGroup">
      <input class='form__Radio' type="radio" name="radio" id="rooms" value='Rooms'>
      <label for="rooms">Rooms</label>
    </div>
    <div class="form__RadioGroup">
      <input class='form__Radio' type="radio" name="radio" id="professors" value='Professors'>
      <label for="professors">Professors</label>
    </div>
  </div>
  <div class='form__LoadSearch'>
    <input type="text" name="loadSearch" id="liveSearch" placeholder='Search Sections'>
    <input id="liveSearch--Status" type="hidden" name="searchState" value="1">
  </div>
  <div class='module__Container sect__Container'>
    <?php

    if (isset($_GET['sectID'])) {
      $sectID = $_GET['sectID'] ?? '';
      $sections = $sectView->FetchSectionsByState(1);
      $sectView->DisplayInSectLoad($sections, $sectID);
    }

    ?>
  </div>
  <div class='module__Container room__Container'>
    <?php



    if (isset($_GET['rmID'])) {
      $roomID = $_GET['rmID'] ?? '';
      $rooms = $roomView->FetchRoomsByState(1);
      $roomView->DisplayInRoomLoad($rooms, $roomID);
    }


    ?>
  </div>
  <div class='module__Container prof__Container'>
    <?php

    if (isset($_GET['profID'])) {
      $profID = $_GET['profID'] ?? '';
      $profs = $profView->FetchProfessorsByState(1);
      $profView->DisplayInProfLoad($profs, $profID);
    }

    ?>
  </div>
  <button class='form__Button' type='submit' name='submit'>submit</button>
</form>

<a href="<?php echo $location ?>" class='module__formBackground'></a>