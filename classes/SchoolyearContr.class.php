<?php

class SchoolyearContr extends Schoolyear
{
  public function CreateSchoolYear($data)
  {
    $this->setSchoolyear($data);
  }
  public function ModifySchoolYear($data)
  {
    $this->updateSchoolyear($data);
  }
  public function ModifySchoolYearActive($id)
  {
    $this->updateSchoolyearDeactive();
    $this->updateSchoolyearActive($id);
  }
}
