<?php

class UsersVal
{
  private $data;
  private $errors = [];
  private static $fields = ['username', 'email', 'password', 'roleLevel'];
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
    $this->validateDescription();

    return $this->errors;
  }
  private function validateName()
  {

    $val = trim($this->data['name']);
    $id = trim($this->data['id']);
    if (empty($val)) {
      $this->addError('name', 'Name cannot be empty');
    } else if (!preg_match('/^[a-zA-Z ]*$/', $val)) {
      $this->addError('name', 'Name must only contain letters');
    } else {
      $type = trim($this->data['department']);
      $deptView = new DepartmentsView();
      $results = $deptView->FetchDeptByNameAndType($val, $type);
      if (!empty($results)) {
        $idResult = $results[0]['id'] ?? '';
        if (isset($this->data['update'])) {
          $dept = $deptView->FetchDeptByID($id);
          $idOrig = $dept[0]['id'] ?? '';
          if ($idOrig == $idResult) {
            return;
          }
        }
        $this->addError('name', 'name already exist');
      }
    }
  }
  private function validateDescription()
  {
    $val = trim($this->data['desc']);
    if (empty($val)) {
      $this->addError('desc', 'Description cannot be empty');
    }
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
