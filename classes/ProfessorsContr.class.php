<?php

class ProfessorsContr extends Professors
{

   public function CreateProfessors($data)
   {
      $this->setProfessors($data['empID'], $data['lastName'], $data['firstName'], $data['middleInitial'], $data['suffix'], $data['type'], $data['deptID'],  $data['image']);
      $userContr = new UsersContr();
      $userContr->CreateUser($data);
   }

   public function ModifyProfessorState($state, $id)
   {
      $schedContr = new SchedulesContr();
      if ($state == 0) $schedContr->ModifyScheduleByTypeID('prof', $id);
      $this->updateProfessorState($state, $id);
   }

   public function ModifyProfessor($data)
   {
      $this->updateProfessor($data['profID'], $data['empID'], $data['lastName'], $data['firstName'], $data['middleInitial'], $data['suffix'], $data['type'], $data['deptID'], $data['image']);
   }
}
