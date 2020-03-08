<?php

class Sections extends Dbh
{
  protected function getSections()
  {
    $sql = 'SELECT * FROM section';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function setSections()
  {
    $sql = 'SELECT * FROM section';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getSections()
  {
    $sql = 'SELECT * FROM section';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
}
