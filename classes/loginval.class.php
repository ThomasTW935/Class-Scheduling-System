
<?php

class LoginVal
{
  private $data;
  private $errors = [];
  private static $fields = ['username', 'password'];
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

    $this->validateUsername();

    return $this->errors;
  }
  private function validateUsername()
  {

    $val = trim($this->data['username']);
    if (empty($val)) {
      $this->addError('username', 'Username is empty.');
    } else {
      $usersView = new UsersView();
      $result = $usersView->FetchUserByUsername($val);
      if (!empty($result)) {
        $user = $result[0];
        $this->validatePassword($user['password']);
      } else {
        $this->addError('username', 'Username does not exist!');
      }
    }
  }
  private function validatePassword($password)
  {

    $val = trim($this->data['password']);
    if (empty($val)) {
      $this->addError('password', 'Password is empty.');
    } else {
      $passCheck = password_verify($val, $password);
      if (!$passCheck) {
        $this->addError('password', 'Password is incorrect.');
      }
    }
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
