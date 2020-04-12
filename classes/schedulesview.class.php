<?php

class SchedulesView extends Schedules
{
  public function FetchSchedules()
  {
    $results = $this->getSchedules();
    return $results;
  }
  public function FetchScheduleByID($schedID)
  {
    $result = $this->getScheduleByID($schedID);
    return $result;
  }
  public function FetchScheduleByTimeAndDay($timeFrom, $timeTo, $days)
  {
    $results = $this->getScheduleByTimeAndDay($timeFrom, $timeTo, $days);
    return $results;
  }
}
