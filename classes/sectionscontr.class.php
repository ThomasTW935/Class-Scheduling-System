<?php

class SectionsContr extends Sections
{
  public function CreateSection($data)
  {
    $this->setSection($data['name'], $data['year'], $data['sem'], $data['deptID']);
  }
  public function ModifySection($data)
  {
    $this->updateSection($data['name'], $data['year'], $data['sem'], $data['deptID'], $data['sectID']);
  }
  public function ModifySectionState($state, $id)
  {
    $schedContr = new SchedulesContr();
    if ($state == 0) $schedContr->ModifyScheduleByTypeID('sect', $id);
    $this->updateSectionState($state, $id);
  }
}
