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
  public function DisplayRooms($results)
  {
    echo "<ul class='module__List module__Title'>
            <li class='module__Item'>Name</li>
            <li class='module__Item'>Description</li>
            <li class='module__Item'>Floor</li>
            <li class='module__Item'>Actions</li>
          </ul>";
    foreach ($results as $result) {
      $iconName = ($result['is_active'] == 1) ? 'delete' : 'recover';
      echo " <ul class='module__List'>
        <li class='module__Item'>" . $result['rm_name'] . "</li>
        <li class='module__Item'>" . $result['rm_desc'] . "</li>
        <li class='module__Item'>" . $result['rm_floor'] . "</li>
        <li class='module__Item'>
          <div>
              <a href=?id=" . $result['rm_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>
              <form onsubmit='return submitForm(this)' action='./includes/rooms.inc.php' method='POST'>
                <input name='id' type='hidden' value='" . $result['rm_id'] . "'>
                <input name='status' type='hidden' value='" . $result['is_active'] . "'>
                <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
                <span>" . $iconName . "</span>
              </form>
          </div>
        </li>
      </ul>";
    }
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
}
