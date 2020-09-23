<?php

class Rooms extends Dbh
{
  protected function getRoomsByState($state, $page, $limit)
  {
    $jump = $limit * ($page - 1);
    $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
    $sql = "SELECT * FROM rooms WHERE rm_active = ? $withLimit";
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
  protected function getRoomBySearch($search, $state, $page, $limit)
  {
    $jump = $limit * ($page - 1);
    $withLimit = ($page > 0) ? "LIMIT $jump,$limit" : "";
    $search = "%{$search}%";
    $sql = "SELECT * FROM rooms WHERE (rm_name LIKE ? OR rm_desc LIKE ? OR rm_floor LIKE ? OR rm_capacity LIKE ?) AND rm_active = ? $withLimit";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$search, $search, $search, $search, $state]);
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getRoomTypes()
  {
    $sql = "SELECT DISTINCT rm_desc FROM rooms WHERE rm_desc != 'Lecture Room'";
    return $this->tryCatchBlock($sql, [], true, 'Rooms');
  }
  protected function getRoomsBySubj($isLab)
  {

    $sql = "SELECT rm_id,rm_name,rm_desc,rm_floor, CONCAT('Max: ', rm_capacity) as rm_capacity, is_laboratory, rm_active FROM rooms WHERE is_laboratory = ? AND rm_active = 1 ORDER BY rm_name,rm_desc";
    return $this->tryCatchBlock($sql, [$isLab], true, 'Rooms');
  }
  protected function getRoomsByTime($timeFrom, $timeTo, $days, $schoolYearID)
  {
    $newDays = '';
    for ($x = 0; $x < sizeof($days); $x++) {
      $comma = ',';
      if ($x == sizeof($days) - 1) {
        $comma = '';
      }
      $newDays .= "'$days[$x]'$comma";
    }
    $sql = "SELECT DISTINCT sc.room_id as room_id FROM schedules sc 
    INNER JOIN schedules_day sd ON sc.sched_id = sd.sched_id
    INNER JOIN rooms rm ON sc.room_id = rm.rm_id 
    WHERE sc.school_year_id = $schoolYearID 
    AND ((sched_from >= '$timeFrom' AND sched_from < '$timeTo') OR (sched_to > '$timeFrom' AND sched_to < '$timeTo')) AND sched_day IN($newDays)";
    return $this->tryCatchBlock($sql, [], true, 'Rooms');
  }


  protected function setRoom($name, $desc, $floor, $capacity, $isLab)
  {
    $sql = 'INSERT INTO rooms (rm_name, rm_desc, rm_floor,rm_capacity,is_laboratory) VALUES (?,?,?,?,?)';
    $this->tryCatchBlock($sql, [$name, $desc, $floor, $capacity, $isLab], false, 'Rooms');
  }
  protected function updateRoom($name, $desc, $floor, $capacity, $isLab, $id)
  {
    $sql = 'UPDATE rooms SET rm_name = ?, rm_desc = ?, rm_floor = ?,rm_capacity = ?, is_laboratory = ? WHERE rm_id = ?';
    $this->tryCatchBlock($sql, [$name, $desc, $floor, $capacity, $isLab, $id], false, 'Rooms');
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
