<?php

class SectionsView extends Sections
{
    public function FetchSectionsByState($schoolYearID, $state,  $page = 0, $limit = 0)
    {
        $results = $this->getSectionsByState($schoolYearID, $state,  $page, $limit);
        return $results;
    }
    public function FetchSectionByID($id)
    {
        $results = $this->getSectionByID($id);
        return $results;
    }
    public function FetchSectionByName($name)
    {
        $results = $this->getSectionByName($name);
        return $results;
    }
    public function FetchSectionByDept($deptID, $schoolYearID)
    {
        $results = $this->getSectionByDept($deptID, $schoolYearID);
        return $results;
    }
    public function FetchSectionsBySearch($search, $schoolYearID, $state, $page = 0, $limit = 0)
    {
        $results = $this->getSectionsBySearch($search, $schoolYearID, $state, $page, $limit);
        return $results;
    }
    public function FetchSectionsBySubj($schoolYearID, $subjID)
    {
        $results = $this->getSectionsBySubj($schoolYearID, $subjID);
        return $results;
    }
    public function DisplaySectionsInSearch($results)
    {
        $schedView = new SchedulesView();
        foreach ($results as $result) {
            $optionData = $schedView->GenerateOptionDataValue($result['sect_id'], [$result['sect_name'], $result['sect_year'], $result['dept_name']]);
            echo "<option data-value='{$optionData['id']}' value='{$optionData['value']}'> <ul class='module__List'>
            <li class='module__Item'>" . $result['sect_name'] . " |</li>
            <li class='module__Item'>{$result['sect_year']} |</li>
            <li class='module__Item'>" . $result['dept_name'] . "</li>
            </ul></option>";
        }
    }
    public function DisplaySections($results, $page, $totalPages, $destination)
    {
        $func = new Functions();
        $func->TableTemplate("sect", $results, $page);
        $func->BuildPagination($page, $totalPages, $destination);
    }
}
