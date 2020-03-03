<?php

class UsersContr extends Users
{
  public function CreateUser($data)
  {
    $this->setUser($data['username'], $data['email'], $data['password'], $data['roleLevel']);
  }
  public function ModifyUser($data)
  {
    $this->updateUser($data['username'], $data['email'], $data['password'], $data['roleLevel'], $data['id']);
  }
  public function RemoveUser($id)
  {
    $this->deleteUser($id);
  }
}
