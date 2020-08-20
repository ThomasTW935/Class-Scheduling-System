<?php

class Functions
{
  public function BuildQuery($errors, $data)
  {
    foreach ($errors as $errorKey => $errorValue) {
      foreach ($data as $key => $value) {
        $needle = strtolower($key);
        $haystack = strtolower($errorKey);
        if ((strpos($haystack, $needle) !== false)) {
          unset($data[$key]);
        }
      }
    }
    $query = '&' . http_build_query($errors) . '&' . http_build_query($data);
    return $query;
  }
  public function BuildPagination($currentPage, $pagesCount, $destination)
  {
    echo "<div class='module__Pages'>";
    echo "<ul>";
    if ($pagesCount > 1) {
      $previous = $currentPage - 1;
      $checkPrevious = ($currentPage > 1) ? "" : " class='disabled'";
      echo "<li><a href='$destination$previous' $checkPrevious>Previous</a></li>";
    }
    if ($pagesCount > 1 && $pagesCount <= 10) {

      for ($i = 1; $i <= $pagesCount; $i++) {
        $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
        echo "<li><a $activePage>$i</a></li>";
      }
    } else if ($pagesCount > 10) {
      $secondLast = $pagesCount - 1;
      $firstNums = "<li><a href='{$destination}1'>1</a></li>
                  <li><a href='{$destination}2'>2</a></li>";
      $lastNums =  "<li><a href='$destination$secondLast'>$secondLast</a></li>
                  <li><a href='$destination$pagesCount'>$pagesCount</a></li>";
      $separator = "<li><a>...</a></li>";

      if ($currentPage <= 4) {
        for ($i = 1; $i < 8; $i++) {
          $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
          echo "<li><a $activePage>$i</a></li>";
        }
        echo $separator;
        echo $lastNums;
      } else if ($currentPage > 4 && $currentPage < $pagesCount - 4) {
        echo $firstNums;
        echo $separator;
        for ($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
          $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
          echo "<li><a $activePage>$i</a></li>";
        }
        echo $separator;
        echo $lastNums;
      } else {
        echo $firstNums;
        echo $separator;
        for ($i = $pagesCount - 6; $i <= $pagesCount; $i++) {
          $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
          echo "<li><a $activePage>$i</a></li>";
        }
      }
    }
    if ($pagesCount > 1) {
      $next = $currentPage + 1;
      $checkNext = ($currentPage < $pagesCount) ? "" : " class='disabled'";
      echo "<li><a href='$destination$next' $checkNext>Next</a></li>";
    }
    echo "</ul>";
    echo "</div>";
  }

  public function TableProperties($type, $data, $archived = false, $search = '')
  {
    $newArray = [];
    $isSearch = (!empty($search)) ? "q=$search&" : "";
    if ($type == 'prof') {
      $limit = 11;
      $destination = (!$archived) ? "?{$isSearch}page=" : "?archive&{$isSearch}page=";
    } else if ($type == 'room') {
      $limit = 11;
      $destination = (!$archived) ? "?{$isSearch}page=" : "?archive&{$isSearch}page=";
    } else if ($type == 'sect') {
      $limit = 4;
      $destination = (!$archived) ? "?{$isSearch}page=" : "?archive&{$isSearch}page=";
    } else if ($type == 'subj') {
      $limit = 11;
      $destination = (!$archived) ? "?{$isSearch}page=" : "?archive&{$isSearch}page=";
    } else if ($type == 'user') {
      $limit = 11;
      $destination = (!$archived) ? "?{$isSearch}page=" : "?archive&{$isSearch}page=";
    }
    if ($type == 'faculty') {
      $limit = 11;
      $destination = (!$archived) ?  "?dept=faculty&{$isSearch}page=" : "?dept=faculty&archive&{$isSearch}page=";
    } else if ($type == 'course') {
      $limit = 11;
      $destination = (!$archived) ?  "?dept=course&{$isSearch}page=" : "?dept=course&archive&{$isSearch}page=";
    } else if ($type == 'strand') {
      $limit = 11;
      $destination = (!$archived) ?  "?dept=strand&{$isSearch}page=" : "?dept=strand&archive&{$isSearch}page=";
    }


    $totalPages = ceil(count($data) / $limit);
    $newArray['totalpages'] = $totalPages;
    $newArray['limit'] = $limit;
    $newArray['destination'] = $destination;

    return $newArray;
  }
  public function TableTemplate($type, $results, $currentPage)
  {
    $tableValues = $this->SetTableValues($type);
    echo "<table class='module__Table'>";
    echo "<thead>";
    echo "<tr class=''>";
    foreach ($tableValues["head"] as $key => $value) {
      echo "<th>$value</th>";
    }
    echo  "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($results as $result) {
      echo "<tr class=''>";
      if ($type == 'prof') {
        // $profView  = new ProfessorsView();
        // $middleInitial = (!empty($result['middle_initial'])) ? $result['middle_initial'] . '.' : '';
        // $fullName = $prof->GenerateFullName($result['last_name'], $result['first_name'], $result['middle_initial'], $result['suffix']);
        // $tableBody['full_name'] = $fullName;
        echo "<td class='prof-image'><img src='./drawables/images/" . $result['img'] . "'></td>";
      }
      foreach ($tableValues["body"] as $key => $value) {
        echo "<td>{$result[$value]}</td>";
      }
      $action = $this->BuildTableActions($type, $result, $currentPage);
      echo "<td>
      <div class='table-actions'>$action</div>
      </td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  }
  public function SetTableValues($type)
  {
    $tableHead = [];
    $tableBody = [];
    $newArray = [];
    if ($type == 'subj') {
      $tableHead = ["Subject Code", "Subject Description", "Unit/s", "Actions"];
      $tableBody = ["subj_code", "subj_desc", "units"];
    } else if ($type == 'sect') {
      $tableHead = ["Section", "Year And Semester", "Department", "Actions"];
      $tableBody = ["sect_name", "sect_yrsem", "dept_name"];
    } else if ($type == 'room') {
      $tableHead = ["Room", "Description", "Floor", "Actions"];
      $tableBody = ["rm_name", "rm_desc", "rm_floor"];
    } else if ($type == 'prof') {
      $tableHead = [" ", "Employee ID", "Employee Name", "Department", "Actions"];
      $tableBody = ["emp_no", "full_name", "dept_name"];
    } else if ($type == 'user') {
      $tableHead = ["Username", "Email", "Role Level", "Actions"];
      $tableBody = ["username", "email", "role_level"];
    }
    $newArray["head"] = $tableHead;
    $newArray["body"] = $tableBody;
    return $newArray;
  }

  public function BuildTableActions($type, $result, $page)
  {
    $action = '';

    if ($type == "subj") {
      if ($result['subj_active'] == 1) {
        $action .= "<form method='POST' action='./schedules.php'>
            <input type='hidden' name='type' value='subj'>
            <input type='hidden' name='id' value='" . $result['subj_id'] . "'>
            <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
            <span>Schedule</span></form>
            <a href='?page=$page&id=" . $result['subj_id'] . "'><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      $iconName = ($result['subj_active'] == 1) ? 'delete' : 'restore';
      $tableRestore = ($result['subj_active'] == 1) ? '' : "class='table__Restore'";
      $action .= "<form onsubmit='return submitForm(this)' action='./includes/subjects.inc.php' method='POST' $tableRestore>
      <input type='hidden' name='page' value='$page'>
      <input name='subjID' type='hidden' value='" . $result['subj_id'] . "'>
      <input id='state' name='state' type='hidden' value='" . $result['subj_active'] . "'>
      <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='$iconName'/></button>
      <span>" . $iconName . "</span>
      </form>";
    } else if ($type == 'sect') {
      if ($result['sect_active'] == 1) {

        $action .= "<form method='POST' action='./schedules.php'>
        <input type='hidden' name='type' value='sect'>
        <input type='hidden' name='id' value='" . $result['sect_id'] . "'>
        <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
        <span>Schedule</span></form>
        <a href=?page=$page&id=" . $result['sect_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      $iconName = ($result['sect_active'] == 1) ? 'delete' : 'restore';
      $tableRestore = ($result['sect_active'] == 1) ? '' : "class='table__Restore'";
      $action .= "<form onsubmit='return submitForm(this)' action='./includes/sections.inc.php' method='POST' $tableRestore>
      <input name='page' type='hidden' value='$page'>
      <input name='sectID' type='hidden' value='" . $result['sect_id'] . "'>
      <input id='state' name='state' type='hidden' value='" . $result['sect_active'] . "'>
            <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='$iconName'/></button>
            <span>" . $iconName . "</span>
        </form>";
    } else if ($type == 'room') {
      if ($result['rm_active'] == 1) {
        $action .= "<form method='POST' action='./schedules.php'>
        <input type='hidden' name='type' value='room'>
        <input type='hidden' name='id' value='" . $result['rm_id'] . "'>
        <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
        <span>Schedule</span></form>
        <a href=?page=$page&id=" . $result['rm_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      $iconName = ($result['rm_active'] == 1) ? 'delete' : 'restore';
      $tableRestore = ($result['rm_active'] == 1) ? '' : "class='table__Restore'";
      $action .= "<form onsubmit='return submitForm(this)' action='./includes/rooms.inc.php' method='POST'  $tableRestore>
                <input name='page' type='hidden' value='$page'>
                <input name='rmID' type='hidden' value='" . $result['rm_id'] . "'>
                <input id='state' name='state' type='hidden' value='" . $result['rm_active'] . "'>
                <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='$iconName'/></button>
                <span>" . $iconName . "</span>
              </form>";
    } else if ($type == 'prof') {
      if ($result['prof_active'] == 1) {
        $action .= "<form method='POST' action='./schedules.php'>
        <input type='hidden' name='type' value='prof'>
        <input type='hidden' name='id' value='" . $result['id'] . "'>
        <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
        <span>Schedule</span></form>
        <a href=?page=$page&id=" . $result['id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      $iconName = ($result['prof_active'] == 1) ? 'delete' : 'restore';
      $tableRestore = ($result['prof_active'] == 1) ? '' : "class='table__Restore'";
      $action .= "<form onsubmit='return submitForm(this)' action='./includes/professors.inc.php' method='POST'  $tableRestore>
              <input name='page' type='hidden' value='$page'>
              <input name='id' type='hidden' value='" . $result['id'] . "'>
              <input name='userID' type='hidden' value='" . $result['user_id'] . "'>
              <input id='state' name='state' type='hidden' value='" . $result['prof_active'] . "'>
              <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='$iconName'/></button>
              <span>" . $iconName . "</span>
           </form>";
    } else if ($type == 'user') {
      if ($result['is_active'] == 1) {
        $action .= "<a href=?page=$page&id=" . $result['user_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      $iconName = ($result['is_active'] == 1) ? 'delete' : 'restore';
      $tableRestore = ($result['is_active'] == 1) ? '' : "class='table__Restore'";
      $action .= "<form onsubmit='return submitForm(this)' action='./includes/users.inc.php' method='POST' $tableRestore>
                 <input name='page' type='hidden' value='$page'>
                 <input name='userID' type='hidden' value='" . $result['user_id'] . "'>
                 <input id='state' name='state' type='hidden' value='" . $result['is_active'] . "'>
                 <button name='submitStatus' type='submit' ><img src='drawables/icons/" . $iconName . ".svg' alter='$iconName'/></button>
                 <span>" . $iconName . "</span>
              </form>";
    }
    return $action;
  }
}
