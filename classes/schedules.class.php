<?php

class Schedules extends Dbh
{
  protected function setSchedule($timeFrom, $timeTo, $day, $profID, $subjID, $rmID, $sectID)
  {
    $sql = 'INSERT INTO schedules (sched_from,sched_to,sched_day,prof_id,subj_id,rm_id,sect_id) VALUES(?,?,?,?,?,?)';
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
  protected function getSchedules()
  {
    $sql = "SELECT * FROM schedules";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
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
  protected function getScheduleByTimeAndDay($timeFrom, $timeTo, $days)
  {
    $days = implode(',', $days);
    $sql = "SELECT * FROM schedules WHERE (sched_from >= ? AND sched_to < ? OR sched_from <= ? AND sched_to >= ?) AND sched_day IN ($days)";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$timeFrom, $timeTo, $timeFrom, $timeTo]);
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
}
