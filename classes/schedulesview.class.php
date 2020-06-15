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
  public function GenerateTimeOptions($startTime,$endTime,$selected, $jump = 60){
    for ($i = $startTime; $i <= $endTime; $i += $jump * 60) {
      echo "<option value = '" . date('H:i', $i) . "' ";
      if ($i == $selected) {
         echo "selected >" . date('g:i A', $i);
      } else {
         echo " >" . date('g:i A', $i);
      }
      echo "</option>";
   }
  }
}
