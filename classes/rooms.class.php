<?php

class Rooms extends Dbh
{
  protected function getRooms()
  {
    $sql = 'SELECT * FROM rooms';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }
}
