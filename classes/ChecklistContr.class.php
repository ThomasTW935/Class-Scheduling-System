<?php

class ChecklistContr extends Checklist
{
  public function CreateChecklist($data)
  {
    $this->setChecklist($data);
  }
  public function ModifyChecklist($data)
  {
    $this->updateChecklist($data);
  }
  public function ModifyChecklistState($state, $id)
  {
    $this->updateChecklistState($state, $id);
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
