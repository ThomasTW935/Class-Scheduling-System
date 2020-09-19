<?php

class SectionsVal
{
  private $data;
  private $errors = [];
  private static $fields = ['sectID', 'name', 'levelID'];
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
    $id = trim($this->data['sectID']);
    if (empty($val)) {
      $this->addError('errorName', 'Section cannot be empty');
    } else {
      $sectView = new SectionsView();
      $result = $sectView->FetchSectionByName($val);
      if (!empty($result)) {
        if (isset($this->data['update'])) {
          $sect = $sectView->FetchSectionByID($id);
          $idOrig = $sect[0]['sect_id'] ?? '';
          $idGet = $result[0]['sect_id'] ?? '';
          if ($idOrig == $idGet) {
            return;
          }
        }
        $this->addError('errorName', 'Section already exist');
      }
    }
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
