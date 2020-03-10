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
    public function FetchSectionsBySearch($search, $state)
    {
        $results = $this->getSectionsBySearch($search, $state);
        return $results;
    }
    // public function DisplaySectionsForm($type)
    // {
    //     echo "<a href='sections.php' class='form__Close'>X</a>
    //     <label for='formSelect' class='form__Title'>Section's Information</label>
    //     <input class='form__Input' type='hidden' value='' name='sectID'>
    //     <div class='form__RadioContainer'>
    //        <div class='form__RadioGroup'>
    //             <label for='' class='form__Label'>Tertiary:</label>
    //             <input class='form__Radio' type='radio' value='course' name='deptType' checked>
    //        </div>
    //        <div class='form__RadioGroup'>
    //             <label for='' class='form__Label'>SHS:</label>
    //             <input class='form__Radio' type='radio' value='strand' name='deptType'>
    //        </div>
    //     </div>
    //     <div class='form__Container'>
    //         <label for='' class='form__Label'>Section:</label>
    //         <div class='form__Input'>
    //           <input class='form__Input' type='text' value='" . $sect['sect_code'] ?? '' . "' name='name' placeholder='Section' required>
    //           <div class='form__Error'>" . $errors['errorCode'] ?? '' . "</div>
    //        </div>
    //     </div>";

    //     if ($type == 'course') {
    //         echo "<div class='form__Container'>
    //             <label for='' class='form__Label'>Year Level:</label>
    //             <div class='form__Input'>
    //                 <input class='form__Input' type='number' value='" . $sect['sect_year'] ?? '' . "' name='year' placeholder='Year' required>
    //                 <div class='form__Error'>" . $errors['errorCode'] ?? '' . "</div>
    //             </div>
    //             </div>
    //         <div class='form__Container'>
    //            <label for='' class='form__Label'>Semester:</label>
    //            <div class='form__Input'>
    //               <input class='form__Input' type='number' value='" . $sect['sect_sem'] ?? '' . "' name='sem' placeholder='Semester' required>
    //               <div class='form__Error'>" . $errors['errorCode'] ?? '' . "</div>
    //            </div>
    //         </div>";
    //     } else {
    //         echo "<div class='form__Container'>
    //             <label for='' class='form__Label'>Grade Level:</label>
    //             <div class='form__Input'>
    //                 <input class='form__Input' type='number' value='" . $sect['sect_year'] ?? '' . "' name='year' placeholder='Year' required>
    //                 <div class='form__Error'>" . $errors['errorCode'] ?? '' . "</div>
    //             </div>
    //         </div>";
    //     }

    //     echo "<div class='form__Container'>
    //     <label for='' class='form__Label'>Department:</label>
    //     <div class='form__Input'>
    //     <select name='deptID' id='formSelect'>";
    //     $deptView = new DepartmentsView();
    //     $departments = $deptView->FetchDepts($type, 1);
    //     foreach ($departments as $dept) {
    //         $selected = ($sect['dept_id'] == $dept['dept_id']) ? 'selected' : '';
    //         echo "<option class='form__Option' value='{$dept['dept_id']} ' {$selected}>{$dept['dept_name']}</option>";
    //     }
    //     echo "</select>
    //     </div>
    //     </div>
    //     <button class='form__Button' type='submit' name='<?php echo $button '> echo $button </button>";
    // }
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

                echo "<a href=?id=" . $result['sect_id'] . "><img src='drawables/icons/checkschedule.svg' alter='Schedule'/><span>Schedule</span></a>
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
