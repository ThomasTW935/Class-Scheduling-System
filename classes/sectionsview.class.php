<?php

class SectionsView extends Sections
{
    public function FetchSectionsByState($state)
    {
        $results = $this->getSectionsByState($state);
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
    public function FetchSectionsBySearch($search, $state)
    {
        $results = $this->getSectionsBySearch($search, $state);
        return $results;
    }
    public function DisplaySectionsInSearch($results)
    {
        foreach ($results as $result) {
            $iconName = ($result['sect_active'] == 1) ? 'delete' : 'restore';
            echo "<option data-value='" . $result['sect_id'] . "' value='" . $result['sect_name'] . "'> <ul class='module__List'>
            <li class='module__Item'>" . $result['sect_name'] . "</li>
            <li class='module__Item'>{$result['sect_year']}YR {$result['sect_sem']}SEM</li>
            <li class='module__Item'>" . $result['dept_name'] . "</li></ul></option>";
        }
    }
    public function DisplaySections($results)
    {
        echo "<ul class='module__List module__Title'>
            <li class='module__Item'>Section</li>
            <li class='module__Item'>Year and Semester</li>
            <li class='module__Item'>Department</li>
            <li class='module__Item'>Actions</li>
          </ul>";
        foreach ($results as $result) {
            $iconName = ($result['sect_active'] == 1) ? 'delete' : 'restore';
            echo " <ul class='module__List'>
            <li class='module__Item'>" . $result['sect_name'] . "</li>
            <li class='module__Item'>{$result['sect_year']}YR {$result['sect_sem']}SEM</li>
            <li class='module__Item'>" . $result['dept_name'] . "</li>
            <li class='module__Item'>
            <div>";
            if ($result['sect_active'] == 1) {

                echo "<form method='POST' action='./schedules.php'>
                <input type='hidden' name='type' value='sect'>
                <input type='hidden' name='id' value='" . $result['sect_id'] . "'>
                <button name='submitType' type='submit'><img src='drawables/icons/checkschedule.svg' alter='Schedule'/></button>
                <span>Schedule</span></form>
                    <a href=?id=" . $result['sect_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
            }
            echo "<form onsubmit='return submitForm(this)' action='./includes/sections.inc.php' method='POST'>
                    <input name='sectID' type='hidden' value='" . $result['sect_id'] . "'>
                    <input id='state' name='state' type='hidden' value='" . $result['sect_active'] . "'>
                    <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
                    <span>" . $iconName . "</span>
                </form>
            </div>
            </li>
        </ul>";
        }
    }
}
