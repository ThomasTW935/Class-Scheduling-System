<?php

class DepartmentsView extends Departments
{

   public function FetchDepts($type, $state, $page = 0, $limit = 0)
   {
      $results = $this->getDepartments($type, $state, $page, $limit);
      return $results;
   }
   public function FetchDeptsWithSect($type, $state)
   {
      $results = $this->getDeptartmentsWithSection($type, $state);
      return $results;
   }
   public function FetchDeptsWithChecklist($type, $state)
   {
      $results = $this->getDeptartmentsWithChecklist($type, $state);
      return $results;
   }
   public function FetchDeptsBySearch($search, $state, $type, $page = 0, $limit = 0)
   {
      $results = $this->getDepartmentBySearch($search, $state, $type, $page, $limit);
      return $results;
   }
   public function DisplayDepts($results, $page, $totalPages, $destination)
   {
      echo "<table class='module__Table'>";
      echo "<thead>";
      echo "<tr class='module__List module__Title'>
               <th class='module__Item'>Program</th>
               <th class='module__Item'>Description</th>
               <th class='module__Item'>Actions</th>
            </tr>";
      echo "</thead>";
      echo "<tbody>";
      foreach ($results as $result) {
         $iconName = ($result['dept_active'] == 1) ? 'delete' : 'restore';
         echo "<tr class='module__List'>
         <td class='module__Item'>" . $result['dept_name'] . "</td>
         <td class='module__Item'>" . $result['dept_desc'] . "</td>
         <td class='module__Item'>
            <div class='table-actions'>";
         if ($result['dept_active'] == 1) {
            echo "<a href='checklist.php?deptid={$result['dept_id']}&page=1'><img src='drawables/icons/checkschedule.svg' alter='Checklists'/><span>Checklists</span></a>";
            echo "<a href='?dept={$result['dept_type']}&page=$page&id={$result['dept_id']}'><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
         }
         echo "<form onsubmit='return submitForm(this)' action='./includes/departments.inc.php' method='POST'>
            <input name='page' type='hidden' value='$page'>
            <input name='deptID' type='hidden' value='" . $result['dept_id'] . "'>
            <input name='department' type='hidden' value='" . $result['dept_type'] . "'>
            <input id='state' name='state' type='hidden' value='" . $result['dept_active'] . "'>
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
   public function FetchDeptByID($id)
   {
      $results = $this->getDepartmentByID($id);
      return $results;
   }

   public function FetchDeptByNameAndType($name, $type)
   {
      $result = $this->getDepartmentByNameAndType($name, $type);
      return $result;
   }
}
