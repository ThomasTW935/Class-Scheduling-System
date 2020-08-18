<?php

class RoomsView extends Rooms
{

  public function FetchRoomsByState($state, $page = 0, $limit = 0)
  {
    $results = $this->getRoomsByState($state, $page, $limit);
    return $results;
  }
  public function FetchRoomsBySearch($search, $state, $page = 0, $limit = 0)
  {
    $results = $this->getRoomBySearch($search, $state, $page, $limit);
    return $results;
  }
  public function FetchRoomByLatest()
  {
    $result = $this->getRoomByLatest();
    return $result;
  }
  public function FetchRoomByID($id)
  {
    $result = $this->getRoomByID($id);
    return $result;
  }
  public function FetchRoomByName($name)
  {
    $result = $this->getRoomByName($name);
    return $result;
  }
  public function FloorConvert($floor)
  {
    $place = '';
    switch ($floor % 10) {
      case 1:
        $place .= 'st';
        break;
      case 2:
        $place .= 'nd';
        break;
      case 3:
        $place .= 'rd';
        break;
      default:
        $place .= 'th';
        break;
    }
    $floor .= $place;
    return $floor;
  }
  public function DisplayRoomsInSearch($results)
  {
    $schedView = new SchedulesView();
    foreach ($results as $result) {
      $floor = $this->FloorConvert($result['rm_floor']) . ' floor';
      $name = "Rm {$result['rm_name']}";
      $optionData = $schedView->GenerateOptionDataValue($result['rm_id'], [$name, $result['rm_desc'], $floor]);
      echo "<option data-value='{$optionData['id']}' value='{$optionData['value']}'><ul class='module__List'>
        <li class='module__Item'>" . $result['rm_name'] . " |</li>
        <li class='module__Item'>" . $result['rm_desc'] . " |</li>
        <li class='module__Item'>" . $floor . " floor</li></ul></option>";
    }
  }
  public function DisplayRooms($results, $page, $totalPages, $destination)
  {
    echo "<table class='module__Table'>";
    echo "<thead>";
    echo "<tr class=' '>
            <th class=''>Room</th>
            <th class=''>Description</th>
            <th class=''>Floor</th>
            <th class=''>Actions</th>
          </tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($results as $result) {
      $iconName = ($result['rm_active'] == 1) ? 'delete' : 'restore';
      echo " <tr class=''>
        <td class=''>" . $result['rm_name'] . "</td>
        <td class=''>" . $result['rm_desc'] . "</td>
        <td class=''>" . $result['rm_floor'] . "</td>
        <td class=''>
          <div class='table-actions'>";
      if ($result['rm_active'] == 1) {
        echo "<form method='POST' action='./schedules.php'>
        <input type='hidden' name='type' value='room'>
        <input type='hidden' name='id' value='" . $result['rm_id'] . "'>
        <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
        <span>Schedule</span></form>
        <a href=?page=$page&id=" . $result['rm_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      echo "<form onsubmit='return submitForm(this)' action='./includes/rooms.inc.php' method='POST'>
                <input name='page' type='hidden' value='$page'>
                <input name='rmID' type='hidden' value='" . $result['rm_id'] . "'>
                <input id='state' name='state' type='hidden' value='" . $result['rm_active'] . "'>
                <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
                <span>" . $iconName . "</span>
              </form>
          </div>
        </td>
      </tr>";
    }
    echo "</tbody>";
    echo "</table>";

    $func = new Functions();
    $func->BuildPagination($page, $totalPages, $destination);
  }
}
