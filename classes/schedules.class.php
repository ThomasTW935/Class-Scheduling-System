<?php

class Schedules extends Dbh
{
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
    $sql = "UPDATE schedules_operation SET op_start = ? , op_end = ?, op_jump = '?' WHERE op_id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$timeStart, $timeEnd, $timeJump, $ID]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function getDisplayTime($type, $id){
    $sql = "SELECT * FROM schedules_operation WHERE op_type = ? AND op_typeid = ? LIMIT 1";
    try{
      $stmt= $this->connect()->prepare($sql);
      $stmt->execute([$type,$id]);
      $result = $stmt->fetchAll();
      return $result;
    } catch(PDOException $e){
      trigger_error('Error: '. $e);
    }
  }
  protected function setSchedule($timeFrom, $timeTo, $day, $profID, $subjID, $rmID, $sectID)
  {
    $sql = 'INSERT INTO schedules (sched_from,sched_to,sched_day,prof_id,subj_id,room_id,sect_id) VALUES(?,?,?,?,?,?,?)';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$timeFrom, $timeTo, $day, $profID, $subjID, $rmID, $sectID]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function updateSchedule($timeFrom, $day, $timeTo, $profID, $subjID, $rmID, $sectID, $id)
  {
    $sql = "UPDATE schedules SET sched_from = ?, sched_to = ?,sched_day = ?, prof_id = ?,subj_id = ?,rm_id = ?,sect_id = ? WHERE sched_id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$timeFrom, $timeTo, $day, $profID, $subjID, $rmID, $sectID, $id]);
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
  protected function getScheduleByTypeID($type,$id)
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
  
}
