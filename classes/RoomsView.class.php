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

  public function DisplayRoomsInSearch($results)
  {
    $schedView = new SchedulesView();
    foreach ($results as $result) {
      $capacity = "Capacity: {$result['rm_capacity']}";
      $optionData = $schedView->GenerateOptionDataValue($result['rm_id'], [$result['rm_name'], $result['rm_desc'], $result['rm_floor'], $capacity]);
      echo "<option data-value='{$optionData['id']}' value='{$optionData['value']}'><ul class='module__List'>
        <li class='module__Item'>" . $result['rm_name'] . " |</li>
        <li class='module__Item'>" . $result['rm_desc'] . " |</li>
        <li class='module__Item'>{$result['rm_floor']} |</li>
        <li class='module__Item'>$capacity</li>
        </ul></option>";
    }
  }
  public function DisplayRooms($results, $page, $totalPages, $destination)
  {
    $func = new Functions();
    $func->TableTemplate("room", $results, $page);
    $func->BuildPagination($page, $totalPages, $destination);
  }
}
