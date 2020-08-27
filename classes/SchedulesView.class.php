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
      $optSelect = ($i == $selected) ? "selected" : "";
      echo "<option value='" . date('G:i', $i) . "' $optSelect>" . date('g:i A', $i);
      if ($showTimeDiff) {
        $timeDiff = $i - ($startTime - (60 * 30));
        $hours = date('G', $timeDiff);
        $minutes = date('i', $timeDiff);
        $formatMinutes = ($minutes / 60) * 100;
        $formatMinutes = ($formatMinutes == 50) ? 5 : $formatMinutes;
        $formatMinutes = ($formatMinutes == 0) ? '' : ".$formatMinutes";
        echo " ($hours$formatMinutes hour/s)";
      }
      "</option>";
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
  public function GenerateCellValue($type, $data)
  {
    $subjDesc = $data['subj_desc'] ?? '';
    $sectName = $data['sect_name'] ?? '';
    $lastName = $data['last_name'] ?? '';
    $roomName = $data['rm_name'] ?? '';
    $newArray = [];
    if ($type == 'sect') {
      array_push($newArray, $subjDesc);
      array_push($newArray, $roomName);
      array_push($newArray, $lastName);
    } else if ($type == 'prof') {
      array_push($newArray, $subjDesc);
      array_push($newArray, $roomName);
      array_push($newArray, $sectName);
    } else if ($type == 'subj') {
      array_push($newArray, $lastName);
      array_push($newArray, $roomName);
      array_push($newArray, $sectName);
    } else if ($type == 'room') {
      array_push($newArray, $subjDesc);
      array_push($newArray, $lastName);
      array_push($newArray, $sectName);
    }
    return $newArray;
  }
  public function DisplaySchedule($caption, $start, $end, $jump, $type, $ID)
  {

    echo "<table>";
    echo "<caption class='table__Caption'>$caption</caption>";
    echo "<tr>";
    echo   "<th></th>";
    $daysWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

    foreach ($daysWeek as  $dayWeek) {
      echo "<th>$dayWeek</th>";
    }
    echo "</tr>";

    $values = array();
    $schedSlots = $this->FetchTimeSlotValue($type, $ID);

    for ($i = $start; $i < $end; $i += 15 * 60) {
      $timeDisplay = (($i + $jump * 60) - $start) / 60;
      if ($timeDisplay % $jump == 0) {
        $toTime = date('g:i A', ($i + $jump * 60));

        $time = date('g:i A', $i);
        $values[$time] = array();

        $cellValue =  "<th class='table__Time' scope='row'>$time - $toTime</th>";
        array_push($values[$time], $cellValue);
        foreach ($daysWeek as $days) {
          $cellValue = '<td>---</td>';
          foreach ($schedSlots as $schedSlot) {
            if ($days == $schedSlot['sched_day']) {
              if ($i >= strtotime($schedSlot['sched_from']) && $i < strtotime($schedSlot['sched_to'])) {

                $cellValues = $this->GenerateCellValue($type, $schedSlot);
                $cellValue = "<td class='slot'><a class='form__Toggle' href='?type=$type&id=$ID&schedid={$schedSlot['sched_id']}'>
                                <span>{$cellValues[0]}</span>
                                <span>{$cellValues[1]}</span> 
                                <span>{$cellValues[2]}</span>
                                </a></td>";
              }
            }
          }
          array_push($values[$time], $cellValue);
        }
      }
    }
    foreach ($values as $key => $value) {
      echo "<tr>";
      foreach ($value as $x) {
        if (!empty($x)) {
          echo "$x";
        }
      }
      echo "</tr>";
    }
    echo "</table>";
  }
}
