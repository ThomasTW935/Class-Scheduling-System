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



    $this->validateTime();


    return $this->errors;
  }
  private function validateTime()
  {
    $schedView = new SchedulesView();
    $timeFrom = trim($this->data['timeFrom']);
    $timeTo = trim($this->data['timeTo']);
    $days = $this->data['days'];
    $results = $schedView->FetchScheduleByTimeAndDay($timeFrom, $timeTo, $days);
    if (!empty($results)) {
      $this->validateSection($results['sect_id']);
      $this->validateRoom($results['room_id']);
      $this->validateSubject($results['subj_id']);
      $this->validateProfessor($results['prof_id']);
    }
  }
  private function validateSection($sectID)
  {
  }
  private function validateRoom($roomID)
  {
  }
  private function validateSubject($subjID)
  {
  }
  private function validateProfessor($profID)
  {
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
