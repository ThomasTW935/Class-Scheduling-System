<?php

class SubjectsContr extends Subjects
{
   public function CreateSubject($data)
   {
      $this->setSubject($data['code'], $data['desc'], $data['units'], $data['hours'], $data['deptID'], $data['type']);
   }
   public function ModifySubject($data)
   {
      $this->updateSubject($data['code'], $data['desc'], $data['units'], $data['hours'], $data['deptID'], $data['type'], $data['subjID']);
   }
   public function ModifySubjectState($state, $id)
   {
      $schedContr = new SchedulesContr();
      if ($state == 0) $schedContr->ModifyScheduleByTypeID('subj', $id);
      $this->updateSubjectState($state, $id);
   }
}
