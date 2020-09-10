
<?php

class ProfileVal
{
  private $data;
  private $errors = [];
  private static $fields = ['userID', 'current-password', 'new-password', 'confirm-password'];
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

    $this->validatePassword();

    return $this->errors;
  }
  private function validatePassword()
  {

    $val = trim($this->data['current-password']);
    $id = $this->data['userID'];

    if (empty($val)) {
      $this->addError('errorPassword', 'Password is empty.');
    } else {
      $usersView = new UsersView();
      $result = $usersView->FetchUserByID($id)[0];
      $passHash = password_hash($val, PASSWORD_DEFAULT);
      $passCheck = password_verify($val, $result['password']);
      if (!$passCheck) {
        $this->addError('errorPassword', 'Password is incorrect.');
      }
    }
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
