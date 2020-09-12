<?php

class SchedulesVal
{
  private $data;
  private $errors = [];
  private static $fields = ['timeFrom', 'timeTo', 'days', 'load', 'id'];
  public function __construct($post_data)
  {
    $this->data = $post_data;
  }
  public function validateForm()
  {
    foreach (self::$fields as $field) {
      if (!array_key_exists($field, $this->data)) {
        //trigger_error("$field is not present in data");
        //return;
      }
    }

    $datas = $this->validateSlot();


    if (!empty($datas)) {
      $time = $this->validateTime($datas[$this->data['type']], $this->data['type']);
      if (empty($time)) {
        $prof = $this->validateProfessor($datas['prof']);
        $room = $this->validateRoom($datas['room']);
        $sect = $this->validateSection($datas['sect']);
      }
    }

    // echo "<br>";
    // echo "<br>";
    // var_dump($this->data);
    // echo "<br>";
    // echo "<br>";
    // echo "Errors: ";
    // var_dump($this->errors);
    // exit();


    return $this->errors;
  }

  private function validateSlot()
  {
    $timeFrom = trim($this->data['timeFrom']);
    $timeTo = trim($this->data['timeTo']);
    $days = $this->data['days'];
    $sectID = array();
    $profID = array();
    $roomID = array();
    $subjID = array();
    $schedID = (isset($this->data['update'])) ? $this->data['schedID'] : '';
    $schoolyearView = new SchoolyearView();
    $schedView = new SchedulesView();
    $results = $schedView->FetchScheduleByTimeAndDay($timeFrom, $timeTo, $days, $schedID, $this->data['schoolYearID']);
    foreach ($results as $result) {
      array_push($sectID, $result['sect_id']);
      array_push($profID, $result['prof_id']);
      array_push($subjID, $result['subj_id']);
      array_push($roomID, $result['room_id']);
    }
    $datas = array(
      'subj' => $subjID,
      'prof' => $profID,
      'room' => $roomID,
      'sect' => $sectID,
    );

    return $datas;
  }

  private function validateTime($con, $type)
  {
    $input = "input" . ucfirst($type);
    $result = $this->CheckIfExist($con, $input);
    var_dump($result);
    $timeFrom = trim($this->data['timeFrom']);
    $timeTo = trim($this->data['timeTo']);
    if (empty($timeFrom) || empty($timeTo)) {
      $this->addError('errorTime', '*Choose a time');
    }
    if (!empty($result)) {
      $this->addError('errorTime', '*Time occupied');
      return $result;
    }
  }

  private function validateSection($con)
  {
    $result = $this->CheckIfExist($con, 'inputSect');
    if (!empty($result)) {
      $this->addError('errorSect', '*Section occupied');
      return $result;
    }
  }

  private function validateRoom($con)
  {
    $result = $this->CheckIfExist($con, 'inputRoom');
    if (!empty($result)) {
      $this->addError('errorRoom', '*Room occupied');
      return $result;
    }
  }
  private function validateProfessor($con)
  {
    $result = $this->CheckIfExist($con, 'inputProf');
    if (!empty($result)) {
      $this->addError('errorProf', '*Professor occupied');
      return $result;
    }
  }
  private function CheckIfExist($con, $source)
  {
    foreach ($con as $value) {
      if ($this->data[$source] == $value) {
        return $value;
      }
    }
  }
  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
