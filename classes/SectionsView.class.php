<?php

class SectionsView extends Sections
{
    public function FetchSectionsByState($state, $page = 0, $limit = 0)
    {
        $results = $this->getSectionsByState($state, $page, $limit);
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
    public function FetchSectionByLatest()
    {
        $results = $this->getSectionByLatest();
        return $results;
    }
    public function FetchSectionsBySearch($search, $state, $page = 0, $limit = 0)
    {
        $results = $this->getSectionsBySearch($search, $state, $page, $limit);
        return $results;
    }
    public function DisplaySectionsInSearch($results)
    {
        $schedView = new SchedulesView();
        foreach ($results as $result) {
            $optionData = $schedView->GenerateOptionDataValue($result['sect_id'], [$result['sect_name']]);
            echo "<option data-value='{$optionData['id']}' value='{$optionData['value']}'> <ul class='module__List'>
            <li class='module__Item'>" . $result['sect_name'] . "</li>
            <li class='module__Item'>{$result['sect_year']}YR {$result['sect_sem']}SEM</li>
            <li class='module__Item'>" . $result['dept_name'] . "</li></ul></option>";
        }
    }
    public function DisplaySections($results, $page, $totalPages, $destination)
    {
        echo "<table class='module__Table'>";
        echo "<thead>";
        echo "<tr class=' '>
            <th class=''>Section</th>
            <th class=''>Year and Semester</th>
            <th class=''>Department</th>
            <th class=''>Actions</th>
        </tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($results as $result) {
            $iconName = ($result['sect_active'] == 1) ? 'delete' : 'restore';
            echo " <tr class=''>
            <td class=''>" . $result['sect_name'] . "</td>
            <td class=''>{$result['sect_year']}YR {$result['sect_sem']}SEM</td>
            <td class=''>" . $result['dept_name'] . "</td>
            <td class=''>
            <div class='table-actions'>";
            if ($result['sect_active'] == 1) {

                echo "<form method='POST' action='./schedules.php'>
                <input type='hidden' name='type' value='sect'>
                <input type='hidden' name='id' value='" . $result['sect_id'] . "'>
                <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
                <span>Schedule</span></form>
                    <a href=?page=$page&id=" . $result['sect_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
            }
            echo "<form onsubmit='return submitForm(this)' action='./includes/sections.inc.php' method='POST'>
                    <input name='page' type='hidden' value='$page'>
                    <input name='sectID' type='hidden' value='" . $result['sect_id'] . "'>
                    <input id='state' name='state' type='hidden' value='" . $result['sect_active'] . "'>
                    <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
                    <span>" . $iconName . "</span>
                </form>
            </div>
            </td>
        </tr>";
        }
        echo "</tbody>";
        echo "</table>";



        $func = new Functions();
        $func->BuildPagination($page, $totalPages, $destination);
    }
}
