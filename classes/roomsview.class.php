<?php

class RoomsView extends Rooms
{

  public function FetchRoomsByState($state)
  {
    $results = $this->getRoomsByState($state);
    return $results;
  }
  public function FetchRoomsBySearch($search, $state)
  {
    $results = $this->getRoomBySearch($search, $state);
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
  public function DisplayRooms($results)
  {
    echo "<ul class='module__List module__Title'>
            <li class='module__Item'>Room</li>
            <li class='module__Item'>Description</li>
            <li class='module__Item'>Floor</li>
            <li class='module__Item'>Actions</li>
          </ul>";
    foreach ($results as $result) {
      $iconName = ($result['rm_active'] == 1) ? 'delete' : 'restore';
      echo " <ul class='module__List'>
        <li class='module__Item'>" . $result['rm_name'] . "</li>
        <li class='module__Item'>" . $result['rm_desc'] . "</li>
        <li class='module__Item'>" . $result['rm_floor'] . "</li>
        <li class='module__Item'>
          <div>";
      if ($result['rm_active'] == 1) {
        echo "<form method='POST' action='./schedules.php'>
        <input type='hidden' name='type' value='room'>
        <input type='hidden' name='id' value='" . $result['rm_id'] . "'>
        <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
        <span>Schedule</span></form>
        <a href=?id=" . $result['rm_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
      }
      echo "<form onsubmit='return submitForm(this)' action='./includes/rooms.inc.php' method='POST'>
                <input name='rmID' type='hidden' value='" . $result['rm_id'] . "'>
                <input id='state' name='state' type='hidden' value='" . $result['rm_active'] . "'>
                <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
                <span>" . $iconName . "</span>
              </form>
          </div>
        </li>
      </ul>";
    }
  }
}
