<?php

class SchedulesContr extends Schedules
{
  public function CreateDisplayTime($type, $id)
  {
    $this->setDisplayTime($type, $id);
  }
  public function ModifyDisplayTime($data)
  {
    $this->updateDisplayTime($data["startTime"], $data["endTime"], $data["jumpTime"], $data["id"]);
  }
  public function CreateSchedule($data)
  {
    $this->setSchedule($data['timeFrom'],$data['timeTo'],$data['days'],$data['inputProf'], $data['inputSubj'], $data['inputRoom'], $data['inputSect']);
  }
  public function ModifySchedule($data)
  {
    // $this->updateSchedule($data['profID'], $data['subjID'], $data['rmID'], $data['sectID'], $data['schedID']);
  }
  public function RemoveSchedule($id)
  {
    $this->deleteSchedule($id);
  }
}
