<?php

class RoomsContr extends Rooms
{
  public function CreateRoom($data)
  {
    $this->setRoom($data['name'], $data['desc'], $data['floor']);
  }
  public function ModifyRoom($data)
  {
    $this->updateRoom($data['name'], $data['desc'], $data['floor'], $data['id']);
  }
  public function ModifyRoomState($state, $id)
  {
    $this->updateRoomState($state, $id);
  }
}
