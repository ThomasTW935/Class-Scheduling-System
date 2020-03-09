<?php

class SectionsView extends Sections
{
    public function FetchSectionsByState($state){
        $results = $this->getSectionsByState($state);
        return $results;
    }
    public function FetchSectionsBySearch($search,$state){
        $results = $this->getSectionsBySearch($search,$state);
        return $results;    
    }
    public function DisplaySections($results){
        echo "<ul class='module__List module__Title'>
            <li class='module__Item'>Name</li>
            <li class='module__Item'>Description</li>
            <li class='module__Item'>Year and Semester</li>
            <li class='module__Item'>Department</li>
            <li class='module__Item'>Actions</li>
          </ul>";
        foreach ($results as $result) {
        $iconName = ($result['sect_active'] == 1) ? 'delete' : 'restore';
        echo " <ul class='module__List'>
            <li class='module__Item'>" . $result['sect_name'] . "</li>
            <li class='module__Item'>" . $result['sect_desc'] . "</li>
            <li class='module__Item'>{$result['sect_year']}YR {$result['sect_year']}SEM</li>
            <li class='module__Item'>" . $result['dept_name'] . "</li>
            <li class='module__Item'>
            <div>
                <a href=?id=" . $result['sect_id'] . "><img src='drawables/icons/checkschedule.svg' alter='Schedule'/><span>Schedule</span></a>
                <a href=?id=" . $result['sect_id'] . "><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>
                <form onsubmit='return submitForm(this)' action='./includes/rooms.inc.php' method='POST'>
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
