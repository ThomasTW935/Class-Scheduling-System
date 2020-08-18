<?php

class RoomsVal
{
  private $data;
  private $errors = [];
  private static $fields = ['name', 'desc', 'floor'];
  public function __construct($post_data)
  {
    $this->data = $post_data;
  }
  public function validateForm()
  {
    foreach (self::$fields as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("$field is not present in data");
        return;
      }
    }

    $this->validateName();

    return $this->errors;
  }
  private function validateName()
  {

    $val = trim($this->data['name']);
    $id = trim($this->data['rmID']);
    if (empty($val)) {
      $this->addError('errorName', '*Name cannot be empty');
    } else if (!preg_match('/^[a-zA-Z0-9. ]*$/', $val)) {
      $this->addError('errorName', '*Name must only contain letters');
    } else {
      $roomsView = new RoomsView();
      $results = $roomsView->FetchRoomByName($val);
      if (!empty($results)) {
        $idResult = $results[0]['id'] ?? '';
        if (isset($this->data['update'])) {
          $room = $roomsView->FetchRoomByID($id);
          $idOrig = $room[0]['id'] ?? '';
          if ($idOrig == $idResult) {
            return;
          }
        }
        $this->addError('errorName', '*Name already exist');
      }
    }
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
