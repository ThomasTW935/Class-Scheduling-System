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
    $this->setSchedule($data['timeFrom'], $data['timeTo'], $data['inputProf'], $data['inputSubj'], $data['inputRoom'], $data['inputSect']);
  }
  public function ModifySchedule($data)
  {
    // $this->updateSchedule($data['profID'], $data['subjID'], $data['rmID'], $data['sectID'], $data['schedID']);
  }
  public function RemoveSchedule($id)
  {
    $this->deleteSchedule($id);
  }

  public function CreateDay($schedID, $day)
  {
    $this->setDay($schedID, $day);
  }
  public function ModifyDay($day, $id)
  {
    $this->updateDay($day, $id);
  }
  public function RemoveDay($id)
  {
    $this->deleteDay($id);
  }
}
