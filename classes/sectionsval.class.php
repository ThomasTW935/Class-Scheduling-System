<?php

class SectionsVal
{
  private $data;
  private $errors = [];
  private static $fields = ['code', 'desc'];
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

    $this->validateCode();

    return $this->errors;
  }
  private function validateCode()
  {

    $val = trim($this->data['code']);
    $id = trim($this->data['id']);
    if (empty($val)) {
      $this->addError('employeeID', 'Employee ID cannot be empty');
    } else {
      $subjView = new SubjectsView();
      $result = $subjView->FetchSubjectByCode($val);
      if (!empty($result)) {
        if (isset($this->data['update'])) {
          $subj = $subjView->FetchSubjectByID($id);
          $idOrig = $subj[0]['id'] ?? '';
          $idGet = $result[0]['id'] ?? '';
          if ($idOrig == $idGet) {
            return;
          }
        }
        $this->addError('subjectCode', 'Subject already exist');
      }
    }
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
