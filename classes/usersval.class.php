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
    $this->validateEmail();

    return $this->errors;
  }
  private function validateName()
  {

    $val = trim($this->data['username']);
    if (empty($val)) {
      $this->addError('errorUsername', 'Username cannot be empty');
    } else {
      $usersView = new UsersView();
      $results = $usersView->FetchUserByUsername($val);
      if (!empty($results)) {
        $id = trim($this->data['id']);
        $idResult = $results[0]['id'] ?? '';
        if (isset($this->data['update'])) {
          $user = $usersView->FetchUserByID($id);
          $idOrig = $user[0]['id'] ?? '';
          if ($idOrig == $idResult) {
            return;
          }
        }
        $this->addError('errorUsername', 'Username already exist');
      }
    }
  }
  private function validateEmail()
  {
    $val = trim($this->data['email']);
    if (empty($val)) {
      return;
    } else if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
      $this->addError('errorEmail', 'Invalid Email');
    } else {
      $usersView = new UsersView();
      $results = $usersView->FetchUserByUsername($this->data['username']);
      if (!empty($results)) {
        $id = trim($this->data['userID']);
        $idResult = $results[0]['id'] ?? '';
        if (isset($this->data['update'])) {
          $user = $usersView->FetchUserByID($id);
          $idOrig = $user[0]['id'] ?? '';
          if ($idOrig == $idResult) {
            return;
          }
        }
        $this->addError('errorEmail', 'Email already exist');
      }
    }
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
