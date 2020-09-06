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
}
