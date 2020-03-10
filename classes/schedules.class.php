<?php

class Schedules extends Dbh
{
  protected function setSchedule($profID, $subjID, $rmID, $sectID)
  {
    $sql = 'INSERT INTO sched_details (prof_id,subj_id,rm_id,sect_id) VALUES(?,?,?,?)';
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$profID, $subjID, $rmID, $sectID]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function updateSchedule($profID, $subjID, $rmID, $sectID, $id)
  {
    $sql = "UPDATE sched_details SET prof_id = ?,subj_id = ?,rm_id = ?,sect_id = ? WHERE sched_id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$profID, $subjID, $rmID, $sectID, $id]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
  protected function deleteSchedule($id)
  {
    $sql = "DELETE FROM sched_details WHERE sched_id = ?";
    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
    } catch (PDOException $e) {
      trigger_error('Error: ' . $e);
    }
  }
}
