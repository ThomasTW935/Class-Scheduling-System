<?php

class RoomsContr extends Rooms
{
  public function CreateRoom($data)
  {
    $this->setRoom($data['name'], $data['desc'], $data['floor']);
  }
  public function ModifyRoom($data)
  {
    $this->updateRoom($data['name'], $data['desc'], $data['floor'], $data['rmID']);
  }
  public function ModifyRoomState($state, $id)
  {
    $schedContr = new SchedulesContr();
    if ($state == 0) $schedContr->ModifyScheduleByTypeID('room', $id);
    $this->updateRoomState($state, $id);
  }
}
