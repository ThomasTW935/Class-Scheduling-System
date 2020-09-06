<?php

class SectionsContr extends Sections
{
  public function CreateSection($data)
  {
    $this->setSection($data['name'], $data['chkID'], $data['levelID']);
    $this->setSectionDetails($data['schoolYearID']);
  }
  public function ModifySection($data)
  {
    $this->updateSection($data['name'], $data['chkID'], $data['levelID'], $data['sectID']);
  }
  public function ModifySectionState($state, $schoolYearID, $id)
  {
    $schedContr = new SchedulesContr();
    if ($state == 0) $schedContr->ModifyScheduleByTypeID('sect', $id);
    $this->updateSectionState($state, $schoolYearID, $id);
  }
}
