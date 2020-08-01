<?php

class Schedules extends Dbh
{

  // Schedules Display Time

  protected function setDisplayTime($type, $ID)
  {
    $sql = "INSERT INTO schedules_operation (op_type, op_typeid) VALUES(?,?)";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$type, $ID]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function updateDisplayTime($timeStart, $timeEnd, $timeJump, $ID)
  {
    $sql = "UPDATE schedules_operation SET op_start = ? , op_end = ?, op_jump = ? WHERE op_id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$timeStart, $timeEnd, $timeJump, $ID]);
      var_dump($sql);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getDisplayTime($type, $id)
  {
    $sql = "SELECT * FROM schedules_operation WHERE op_type = ? AND op_typeid = ? LIMIT 1";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$type, $id]);
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }


  // Schedules

  protected function setSchedule($timeFrom, $timeTo, $profID, $subjID, $rmID, $sectID)
  {
    $sql = 'INSERT INTO schedules (sched_from,sched_to,prof_id,subj_id,room_id,sect_id) VALUES(?,?,?,?,?,?)';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$timeFrom, $timeTo, $profID, $subjID, $rmID, $sectID]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function updateSchedule($timeFrom, $timeTo, $profID, $subjID, $rmID, $sectID, $id)
  {
    $sql = "UPDATE schedules SET sched_from = ?, sched_to = ?, prof_id = ?,subj_id = ?,room_id = ?,sect_id = ? WHERE sched_id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$timeFrom, $timeTo, $profID, $subjID, $rmID, $sectID, $id]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function deleteSchedule($id)
  {
    $sql = "DELETE FROM schedules WHERE sched_id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getTimeSlotValue($type, $id)
  {
    $sql = "SELECT sc.sched_id,sched_from,sched_to,sched_day,last_name,rm_name,sect_name,subj_desc FROM schedules sc
    LEFT JOIN schedules_day sd ON sc.sched_id = sd.sched_id
    LEFT JOIN professors pr ON sc.prof_id = pr.id
    LEFT JOIN rooms ro ON sc.room_id = ro.rm_id 
    LEFT JOIN sections se ON sc.sect_id = se.sect_id
    LEFT JOIN subjects su ON sc.subj_id = su.subj_id WHERE sc.{$type}_id = ? ";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getScheduleByID($schedID)
  {
    $sql = "SELECT * FROM schedules WHERE sched_id = ? LIMIT 1";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$schedID]);
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getScheduleByIDDesc()
  {
    $sql = "SELECT sched_id FROM schedules ORDER BY sched_id DESC LIMIT 1";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getScheduleByTypeID($type, $id)
  {
    $sql = "SELECT * FROM schedules WHERE {$type}_id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getScheduleByTimeAndDay($timeFrom, $timeTo, $days, $schedID)
  {
    $newDays = '';
    for ($x = 0; $x < sizeof($days); $x++) {
      $comma = ',';
      if ($x == sizeof($days) - 1) {
        $comma = '';
      }
      $newDays .= "'$days[$x]'$comma";
    }
    $ifUpdate = (!empty($schedID)) ? "AND s.sched_id != $schedID" : '';
    $sql = "SELECT * FROM schedules s INNER JOIN schedules_day sd ON s.sched_id = sd.sched_id WHERE ((sched_from BETWEEN '$timeFrom' AND '$timeTo') OR (sched_to BETWEEN '$timeFrom' AND '$timeTo')) AND sched_day IN($newDays) $ifUpdate";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      var_dump($result);
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }

  // Schedules Day
  protected function setDay($schedID, $day)
  {
    $sql = 'INSERT INTO schedules_day (sched_id,sched_day) VALUES(?,?)';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$schedID, $day]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function updateDay($day, $id)
  {
    $sql = "UPDATE schedules_day SET sched_day = ? WHERE id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$day, $id]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function deleteDay($id)
  {
    $sql = "DELETE FROM schedules_day WHERE id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function deleteDayBySchedID($schedID)
  {
    $sql = "DELETE FROM schedules_day WHERE sched_id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$schedID]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }

  protected function getDayByID($id)
  {
    $sql = "SELECT * FROM schedules_day WHERE id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getDayBySchedID($schedID)
  {
    $sql = "SELECT * FROM schedules_day WHERE sched_id = ? ORDER BY sched_day";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$schedID]);
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
}
