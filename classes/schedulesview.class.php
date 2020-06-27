<?php

class SchedulesView extends Schedules
{
  public function FetchDisplayTime($type,$id){
    $result = $this->getDisplayTime($type,$id);
    return $result;
  }
  public function FetchScheduleByID($schedID)
  {
    $result = $this->getScheduleByID($schedID);
    return $result;
  }
  public function FetchScheduleByTypeID($type,$id)
  {
    $results = $this->getScheduleByTypeID($type, $id);
    return $results;
  }
  public function FetchTimeSlotValue($type,$id){
    $results = $this->getTimeSlotValue($type,$id);
    return $results;
  }
  public function GenerateTimeOptions($startTime,$endTime,$selected, $jump = 60, $showTimeDiff = false){
    for ($i = $startTime; $i <= $endTime; $i += $jump * 60) {
      echo "<option value = '" . date('H:i', $i) . "' ";
      if ($i == $selected) {
         echo "selected >" . date('g:i A', $i) . "</option>";
      } else {
        echo " >" . date('g:i A', $i);
        if($showTimeDiff){
          $timeDiff = $i - $startTime;
          echo " (" . date('g:i',$timeDiff) . " hrs)";
        }
        "</option>";
      }
   }
  }
}
