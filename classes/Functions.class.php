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
  public function GenerateModuleLinks($page, $dept = '', $check = false, $isUsers = false)
  {
    $destination = (!empty($dept)) ? "dept=$dept&" : "";
    $destination = ($check) ? "deptid=$dept&" : $destination;
    if (!isset($_GET['archive'])) {
      if (!$isUsers) {
        echo "   <a href='?{$destination}page=$page&add'><img src='drawables/icons/add.svg' alter='Add' />
        <span>Add</span>
        </a>";
      }
      if ($_SESSION['type'] == 'MIS' || $_SESSION['type'] == 'Academic Head') {
        echo "<a href='?{$destination}archive&page=1'><img src='drawables/icons/archive.svg' alter='Archive' />
         <span>Archive</span>
         </a>";
      }
    } else {
      echo "<a class='module__Return' href='?{$destination}page=1'><img src='drawables/icons/return.svg'/>BACK</a>";
    }
  }

  public function TableProperties($type, $data, $archived = false, $search = '')
  {
    $newArray = [];
    $isSearch = (!empty($search)) ? "q=$search&" : "";
    switch ($type) {
      case 'prof':
      case 'room':
      case 'sect':
      case 'subj':
      case 'schoolyear':
      case 'user':
        $limit = 10;
        $destination = (!$archived) ? "?{$isSearch}page=" : "?archive&{$isSearch}page=";
        break;
      case 'checklist':
        $limit = 10;
        $destination = (!$archived) ? "?deptid=$search&page=" : "?deptid={$search}&archive&page=";
        break;
    }
    if ($type == 'faculty') {
      $limit = 10;
      $destination = (!$archived) ?  "?dept=faculty&{$isSearch}page=" : "?dept=faculty&archive&{$isSearch}page=";
    } else if ($type == 'course') {
      $limit = 10;
      $destination = (!$archived) ?  "?dept=course&{$isSearch}page=" : "?dept=course&archive&{$isSearch}page=";
    } else if ($type == 'strand') {
      $limit = 10;
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
        echo "<td class='prof-image'><img src='./drawables/images/" . $result['img'] . "'></td>";
      }
      foreach ($tableValues["body"] as $key => $value) {
        echo "<td>{$result[$value]}</td>";
      }
      if ($type == 'schoolyear') {
        $isHidden = ($result['hide_schedules']) ? 'True' : 'False';
        echo "<td>$isHidden</td>";
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
      $tableHead = ["Subject Code", "Subject Description", "Unit/s", "Hour/s", 'Department', "Actions"];
      $tableBody = ["subj_code", "subj_desc", "units", 'hours', 'dept_name'];
    } else if ($type == 'schoolyear') {
      $tableHead = ["School Year", "Term", "Operation Start", "Operation End", 'Hide Schedules', "Actions"];
      $tableBody = ["year", "term", "operation_start", "operation_end"];
    } else if ($type == 'dept') {
      $tableHead = ["Program", "Description", "Actions"];
      $tableBody = ["dept_name", "dept_desc"];
    } else if ($type == 'sect') {
      $tableHead = ["Section", "Year And Semester", "Department", "Actions"];
      $tableBody = ["sect_name", "sect_year", "dept_name"];
    } else if ($type == 'room') {
      $tableHead = ["Room", "Description", "Floor", "Capacity", "Actions"];
      $tableBody = ["rm_name", "rm_desc", "rm_floor", "rm_capacity"];
    } else if ($type == 'prof') {
      $tableHead = [" ", "Employee ID", "Employee Name", "Position", "Department", "Actions"];
      $tableBody = ["emp_no", "full_name", 'type', "dept_name"];
    } else if ($type == 'user') {
      $tableHead = ["Username", "Email", 'Empoyee Name', "Actions"];
      $tableBody = ["username", "email", 'full_name'];
    } else if ($type == 'checklist') {
      $tableHead = ["Name", "Actions"];
      $tableBody = ["name"];
    }
    $newArray["head"] = $tableHead;
    $newArray["body"] = $tableBody;
    return $newArray;
  }

  public function BuildTableActions($type, $result, $page)
  {
    $schoolyearView = new SchoolyearView();
    $schoolYear = $schoolyearView->FetchActiveSchoolYear()[0];
    $schoolYearID = $schoolYear['id'];
    $action = '';
    $isActive = (isset($result['is_active'])) ? $result['is_active'] == 1 : '';
    $iconName = ($isActive) ? 'delete' : 'restore';
    $tableRestore = ($isActive) ? '' : "class='table__Restore'";
    $isAdmin = $_SESSION['type'] == 'MIS' || $_SESSION['type'] == 'Academic Head';
    if ($type == "subj") {
      if ($result['subj_active'] == 1) {
        $action .= "<a href='?page=$page&id=" . $result['subj_id'] . "'><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      $iconName = ($result['subj_active'] == 1) ? 'delete' : 'restore';
      $tableRestore = ($result['subj_active'] == 1) ? '' : "class='table__Restore'";
      if ($isAdmin) {
        $action .= "<form onsubmit='return submitForm(this)' action='./includes/subjects.inc.php' method='POST' $tableRestore>
        <input type='hidden' name='page' value='$page'>
        <input name='subjID' type='hidden' value='" . $result['subj_id'] . "'>
        <input id='state' name='state' type='hidden' value='" . $result['subj_active'] . "'>
        <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='$iconName'/></button>
        <span>" . $iconName . "</span>
        </form>";
      }
    } else if ($type == 'dept') {
      if ($result['dept_active'] == 1) {
        if ($result['dept_type'] != 'faculty') {
          $action .= "<a href='checklist.php?deptid={$result['dept_id']}&page=1'><img src='drawables/icons/clipboard.svg' alter='Checklists'/><span>Checklists</span></a>";
        }
        $action .= "<a href='?dept={$result['dept_type']}&page=$page&id={$result['dept_id']}'><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      $iconName = ($result['dept_active'] == 1) ? 'delete' : 'restore';
      $action .= "<form onsubmit='return submitForm(this)' action='./includes/departments.inc.php' method='POST'>
        <input name='page' type='hidden' value='$page'>
        <input name='deptID' type='hidden' value='" . $result['dept_id'] . "'>
        <input name='department' type='hidden' value='" . $result['dept_type'] . "'>
        <input id='state' name='state' type='hidden' value='" . $result['dept_active'] . "'>
        <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
        <span>" . $iconName . "</span>
     </form>";
    } else if ($type == 'sect') {
      if ($isActive) {

        $action .= "<form method='POST' action='./schedules.php'>
        <input type='hidden' name='type' value='sect'>
        <input type='hidden' name='id' value='" . $result['sect_id'] . "'>
        <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
        <span>Schedule</span></form>
        <a href=?page=$page&id=" . $result['sect_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      if ($isAdmin) {
        $action .= "<form onsubmit='return submitForm(this)' action='./includes/sections.inc.php' method='POST' $tableRestore>
        <input name='page' type='hidden' value='$page'>
        <input name='sectID' type='hidden' value='" . $result['sect_id'] . "'>
        <input name='schoolYearID' type='hidden' value='" . $result['school_year_id'] . "'>
        <input id='state' name='state' type='hidden' value='" . $result['is_active'] . "'>
              <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='$iconName'/></button>
              <span>" . $iconName . "</span>
          </form>";
      }
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
      if ($isAdmin) {
        $action .= "<form onsubmit='return submitForm(this)' action='./includes/rooms.inc.php' method='POST'  $tableRestore>
                  <input name='page' type='hidden' value='$page'>
                  <input name='rmID' type='hidden' value='" . $result['rm_id'] . "'>
                  <input id='state' name='state' type='hidden' value='" . $result['rm_active'] . "'>
                  <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='$iconName'/></button>
                  <span>" . $iconName . "</span>
                </form>";
      }
    } else if ($type == 'prof') {
      if ($isActive) {
        $action .= "<form method='POST' action='./schedules.php'>
        <input type='hidden' name='type' value='prof'>
        <input type='hidden' name='id' value='" . $result['id'] . "'>
        <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
        <span>Schedule</span></form>
        <a href=?page=$page&id=" . $result['id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      if ($isAdmin) {
        $action .= "<form onsubmit='return submitForm(this)' action='./includes/professors.inc.php' method='POST'  $tableRestore>
                <input name='page' type='hidden' value='$page'>
                <input name='profID' type='hidden' value='" . $result['id'] . "'>
                <input name='schoolYearID' type='hidden' value='{$result['school_year_id']}'>
                <input id='state' name='state' type='hidden' value='" . $result['is_active'] . "'>
                <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='$iconName'/></button>
                <span>" . $iconName . "</span>
             </form>";
      }
    } else if ($type == 'user') {
      if ($isActive) {
        $action .= "<a href=?page=$page&id=" . $result['user_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      $action .= "<form onsubmit='return submitForm(this)' action='./includes/users.inc.php' method='POST' $tableRestore>
                 <input name='page' type='hidden' value='$page'>
                 <input name='userID' type='hidden' value='" . $result['user_id'] . "'>
                 <input name='schoolYearID' type='hidden' value='" . $result['school_year_id'] . "'>
                 <input id='state' name='state' type='hidden' value='" . $result['is_active'] . "'>
                 <button name='submitStatus' type='submit' ><img src='drawables/icons/" . $iconName . ".svg' alter='$iconName'/></button>
                 <span>" . $iconName . "</span>
              </form>";
    } else if ($type == 'checklist') {
      if ($result['is_active'] == 1) {
        $action .= "<a href=checklistsubjects.php?id={$result['id']}&page=$page><img src='drawables/icons/checkschedule.svg' alter='Edit'/><span>Checklist Subjects</span></a>";
        $action .= "<a href=?deptid={$result['dept_id']}&page=$page&id=" . $result['id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      $iconName = ($result['is_active'] == 1) ? 'delete' : 'restore';
      $tableRestore = ($result['is_active'] == 1) ? '' : "class='table__Restore'";
      $action .= "<form onsubmit='return submitForm(this)' action='./includes/checklist.inc.php' method='POST' $tableRestore>
                 <input name='id' type='hidden' value='" . $result['id'] . "'>
                 <input name='deptID' type='hidden' value='" . $result['dept_id'] . "'>
                 <input id='state' name='state' type='hidden' value='" . $result['is_active'] . "'>
                 <button name='submitStatus' type='submit' ><img src='drawables/icons/" . $iconName . ".svg' alter='$iconName'/></button>
                 <span>" . $iconName . "</span>
              </form>";
    } else if ($type == 'schoolyear') {

      $action .= "<a href=?page=$page&id=" . $result['id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
    }
    return $action;
  }
}
