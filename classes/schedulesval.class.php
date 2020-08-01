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



    $datas = $this->validateTime();

    if (!empty($datas)) {
      $prof = $this->validateProfessor($datas['prof']);
      $room = $this->validateRoom($datas['room']);
      $sect = $this->validateSection($datas['sect']);
      if (empty($prof) && empty($room) && empty($sect)) {
        $subj = $this->validateSubject($datas['subj']);
      }
    }

    return $this->errors;
  }

  private function validateTime()
  {
    $schedView = new SchedulesView();
    $timeFrom = trim($this->data['timeFrom']);
    $timeTo = trim($this->data['timeTo']);
    $days = $this->data['days'];
    $sectID = array();
    $profID = array();
    $roomID = array();
    $subjID = array();
    $schedID = (isset($this->data['update'])) ? $this->data['schedID'] : '';
    $results = $schedView->FetchScheduleByTimeAndDay($timeFrom, $timeTo, $days, $schedID);
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

    echo '<br>';
    echo '<br>';
    echo 'Data: ';
    var_dump($this->data);
    echo '<br>';
    echo 'Error: ';
    var_dump($this->errors);
    return $datas;
  }

  private function validateSection($con)
  {
    $result = $this->CheckIfExist($con, 'inputSect');
    if (!empty($result)) {
      $this->addError('errorSect', 'Section occupied');
      return $result;
    }
  }

  private function validateRoom($con)
  {
    $result = $this->CheckIfExist($con, 'inputRoom');
    if (!empty($result)) {
      $this->addError('errorRoom', 'Room occupied');
      return $result;
    }
  }
  private function validateSubject($con)
  {
    $result = $this->CheckIfExist($con, 'inputSubj');
    if (!empty($result)) {
      $this->addError('errorSubj', 'Subject occupied');
    }
  }
  private function validateProfessor($con)
  {
    $result = $this->CheckIfExist($con, 'inputProf');
    if (!empty($result)) {
      $this->addError('errorProf', 'Professor occupied');
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
