<?php

class ChecklistContr extends Checklist
{
  public function CreateChecklist()
  {
  }


  // Checklist Subjects

  public function CreateChecklistSubject($data)
  {
    $this->setChecklistSubject($data);
  }
  public function ModifyChecklistSubject($data)
  {
    $this->updateChecklistSubject($data);
  }
  public function RemoveChecklistSubject($stcID)
  {

    $this->deleteChecklistSubject($stcID);
  }
}
