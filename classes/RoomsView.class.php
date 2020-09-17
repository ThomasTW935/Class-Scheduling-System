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
  public function FetchRoomsBySubj($isLab)
  {
    $results = $this->getRoomsBySubj($isLab);
    return $results;
  }
  public function FetchRoomTypes()
  {
    $results = $this->getRoomTypes();
    return $results;
  }
  public function DisplayRooms($results, $page, $totalPages, $destination)
  {
    $func = new Functions();
    $func->TableTemplate("room", $results, $page);
    $func->BuildPagination($page, $totalPages, $destination);
  }
}
