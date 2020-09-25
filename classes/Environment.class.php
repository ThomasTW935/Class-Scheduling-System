<?php

class Environment
{


  private $host = 'localhost';
  private $user = "root";
  private $pwd = "";
  private $dbName = "ClassSchedulingSystem";

  // $herokuHost = mysql -u b9e547a06bfec3 -h us-cdbr-east-02.cleardb.com -p heroku_47a94c0a6cb5111 < classschedulingsystem.sql

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
