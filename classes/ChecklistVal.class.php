<?php

class ChecklistVal
{

  private $data;
  private $errors = [];
  private static $fields = ['chkID', 'subjID', 'levelID'];
  public function __construct($post_data)
  {
    $this->data = $post_data;
  }
  public function validateForm()
  {
    foreach (self::$fields as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("$field is not present in data");
        return;
      }
    }
    $this->validateSubject();

    return $this->errors;
  }
  private function validateSubject()
  {

    $subjID = trim($this->data['subjID']);
    $levelID = trim($this->data['levelID']);
    $chkID = $this->data['chkID'];

    $checklistView = new ChecklistView();
    $results = $checklistView->FetchChecklistSubjectBySubjIDAndLevelID($chkID, $subjID, $levelID);
    $result = $results[0];
    if (!empty($results)) {
      if (isset($this->data['update-subject'])) {
        $stcID = $this->data['stcID'];
        if ($stcID == $result['id']) {
          return;
        }
      }
      $this->addError('errorSubject', '*Subject already exist');
    }
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
