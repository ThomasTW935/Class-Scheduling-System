<?php

class Environment
{


  private $host = 'localhost';
  private $user = "root";
  private $pwd = "";
  private $dbName = "ClassSchedulingSystem";


  protected function getHost()
  {
    return $this->host;
  }
  protected function getUser()
  {
    return $this->user;
  }
  protected function getPassword()
  {
    return $this->pwd;
  }
  protected function getDBName()
  {
    return $this->dbName;
  }
}
