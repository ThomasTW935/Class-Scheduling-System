<?php

class UsersContr extends Users
{
  public function HashPass($pass)
  {
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    return $passHash;
  }
  public function CreateUser($data)
  {
    $passNew = $this->HashPass($data['new-password']);
    $this->setUser($data['empID'], $data['email'], $passNew);
  }
  public function ModifyUser($data)
  {
    $this->updateUser($data['username'], $data['email'], $data['userID']);
  }
  public function ModifyPassword($data)
  {
    $passNew = $this->HashPass($data['new-password']);
    $this->updatePassword($passNew, $data['userID']);
  }
  public function ModifyUserState($state, $id, $schoolYearID)
  {
    $this->updateUserState($state, $id, $schoolYearID);
  }
}
