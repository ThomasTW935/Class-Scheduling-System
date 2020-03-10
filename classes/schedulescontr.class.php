<?php

class SchedulesContr extends Schedules
{
  public function CreateSchedule($data)
  {
    $this->setSchedule($data['profID'], $data['subjID'], $data['rmID'], $data['sectID']);
  }
  public function ModifySchedule($data)
  {
    $this->updateSchedule($data['profID'], $data['subjID'], $data['rmID'], $data['sectID'], $data['schedID']);
  }
  public function RemoveSchedule($id)
  {
    $this->deleteSchedule($id);
  }
}
