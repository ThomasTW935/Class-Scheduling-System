<?php

class Rooms extends Dbh
{
  protected function getRoomsByState($state)
  {
    $sql = 'SELECT * FROM rooms WHERE rm_active = ?';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getRoomByID($id)
  {
    $sql = 'SELECT * FROM rooms WHERE rm_id = ? LIMIT 1';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getRoomByLatest()
  {
    $sql = 'SELECT rm_id FROM rooms ORDER BY rm_id DESC LIMIT 1';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getRoomByName($name)
  {
    $sql = 'SELECT * FROM rooms WHERE rm_name = ? LIMIT 1';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name]);
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getRoomBySearch($search, $state)
  {
    $search = "%{$search}%";
    $sql = 'SELECT * FROM rooms WHERE (rm_name LIKE ? OR rm_desc LIKE ? OR rm_floor LIKE ?) AND rm_active = ? ';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$search, $search, $search, $state]);
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function setRoom($name, $desc, $floor)
  {
    $sql = 'INSERT INTO rooms (rm_name, rm_desc, rm_floor) VALUES (?,?,?)';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name, $desc, $floor]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function updateRoom($name, $desc, $floor, $id)
  {
    $sql = 'UPDATE rooms SET rm_name = ?, rm_desc = ?, rm_floor = ? WHERE rm_id = ?';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name, $desc, $floor, $id]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function updateRoomState($state, $id)
  {
    $sql = 'UPDATE rooms SET rm_active = ? WHERE rm_id = ?';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$state, $id]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
}
