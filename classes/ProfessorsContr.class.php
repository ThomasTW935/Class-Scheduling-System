<?php

class ProfessorsContr extends Professors
{

   public function CreateProfessors($data)
   {
      $this->setProfessors($data['empID'], $data['lastName'], $data['firstName'], $data['middleInitial'], $data['suffix'], $data['type'], $data['deptID'],  $data['image']);
      $this->setProfessorDetails($data['schoolYearID']);
      $userContr = new UsersContr();
      $userContr->CreateUser($data);
   }

   public function ModifyProfessorState($state, $profID, $schoolYearID)
   {
      $schedContr = new SchedulesContr();
      if ($state == 0) $schedContr->ModifyScheduleByTypeID('prof', $profID);
      $this->updateProfessorState($state,  $profID, $schoolYearID);
   }

   public function ModifyProfessor($data)
   {
      $this->updateProfessor($data['profID'], $data['empID'], $data['lastName'], $data['firstName'], $data['middleInitial'], $data['suffix'], $data['type'], $data['deptID'], $data['image']);
   }
}
