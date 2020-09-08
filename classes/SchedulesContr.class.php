<?php

class SchedulesContr extends Schedules
{
  // public function CreateDisplayTime($type, $id)
  // {
  //   $this->setDisplayTime($type, $id);
  // }
  // public function ModifyDisplayTime($data)
  // {
  //   $this->updateDisplayTime($data["startTime"], $data["endTime"], $data["jumpTime"], $data["opID"]);
  // }


  public function CreateSchedule($data)
  {
    $this->setSchedule($data['timeFrom'], $data['timeTo'], $data['inputProf'], $data['inputSubj'], $data['inputRoom'], $data['inputSect'], $data['schoolYearID']);
  }
  public function ModifySchedule($data)
  {
    $this->updateSchedule($data['timeFrom'], $data['timeTo'], $data['inputProf'], $data['inputSubj'], $data['inputRoom'], $data['inputSect'], $data['schedID']);
  }
  public function ModifyScheduleByTypeID($type, $id)
  {
    $this->updateScheduleByTypeID($type, $id);
  }
  public function RemoveSchedule($id)
  {
    $this->deleteSchedule($id);
    $this->deleteDayBySchedID($id);
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
