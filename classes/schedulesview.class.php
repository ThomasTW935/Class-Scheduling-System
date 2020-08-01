<?php

class SchedulesView extends Schedules
{
  public function FetchDisplayTime($type, $id)
  {
    $result = $this->getDisplayTime($type, $id);
    return $result;
  }
  public function FetchScheduleByID($schedID)
  {
    $result = $this->getScheduleByID($schedID);
    return $result;
  }
  public function FetchScheduleByIDDesc()
  {
    $result = $this->getScheduleByIDDesc();
    return $result;
  }
  public function FetchScheduleByTypeID($type, $id)
  {
    $results = $this->getScheduleByTypeID($type, $id);
    return $results;
  }
  public function FetchTimeSlotValue($type, $id)
  {
    $results = $this->getTimeSlotValue($type, $id);
    return $results;
  }
  public function FetchScheduleByTimeAndDay($timeFrom, $timeTo, $day, $schedID)
  {
    $results = $this->getScheduleByTimeAndDay($timeFrom, $timeTo, $day, $schedID);
    return $results;
  }

  //Day

  public function FetchDayBySchedID($schedID)
  {
    $results = $this->getDayBySchedID($schedID);
    return $results;
  }

  public function GenerateTimeOptions($startTime, $endTime, $selected, $jump = 60, $showTimeDiff = false)
  {
    for ($i = $startTime; $i <= $endTime; $i += $jump * 60) {
      echo "<option value = '" . date('H:i', $i) . "' ";
      if ($i == $selected) {
        echo "selected >" . date('g:i A', $i) . "</option>";
      } else {
        echo " >" . date('g:i A', $i);
        if ($showTimeDiff) {
          $timeDiff = $i - $startTime;
          echo " (" . date('g:i', $timeDiff) . " hrs)";
        }
        "</option>";
      }
    }
  }
  public function GenerateDayChoices($display, $value, $isChecked = false)
  {
    $checked = ($isChecked) ? 'checked' : '';
    echo "<input type='checkbox' name='days[]' id='$display' value='$value' $checked>";
    echo "<label for='$display'>$display</label>";
  }
  public function GenerateOptionDataValue($id, $data)
  {
    $value = '';
    $seperator = ' | ';
    for ($x = 0; $x < sizeof($data); $x++) {
      if ($x == sizeof($data) - 1) {
        $seperator = "";
      }
      $value .= $data[$x] . $seperator;
    }
    $newArray = array(
      'id' => $id,
      'value' => $value
    );
    return $newArray;
  }
}
