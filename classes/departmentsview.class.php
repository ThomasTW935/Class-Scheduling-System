<?php

class DepartmentsView extends Departments
{

   public function FetchDepts($type, $state, $page = 0, $limit = 0)
   {
      $results = $this->getDepartments($type, $state, $page, $limit);
      return $results;
   }
   public function FetchDeptsBySearch($search, $state, $type)
   {
      $results = $this->getDepartmentBySearch($search, $state, $type);
      return $results;
   }
   public function DisplayDepts($results, $page)
   {
      echo "<ul class='module__List module__Title'>
               <li class='module__Item'>Program</li>
               <li class='module__Item'>Description</li>
               <li class='module__Item'>Actions</li>
            </ul>";
      foreach ($results as $result) {
         $iconName = ($result['dept_active'] == 1) ? 'delete' : 'restore';
         echo "<ul class='module__List'>
         <li class='module__Item'>" . $result['dept_name'] . "</li>
         <li class='module__Item'>" . $result['dept_desc'] . "</li>
         <li class='module__Item'>
         <div>";
         if ($result['dept_active'] == 1) {
            echo "<a href='?dept={$result['dept_type']}&page=$page&id={$result['dept_id']}'><img src='drawables/icons/edit.svg' alter='Edit'/><span>Edit</span></a>";
         }
         echo "<form onsubmit='return submitForm(this)' action='./includes/departments.inc.php' method='POST'>
            <input name='page' type='hidden' value='$page'>
            <input name='id' type='hidden' value='" . $result['dept_id'] . "'>
            <input name='department' type='hidden' value='" . $result['dept_type'] . "'>
            <input id='state' name='state' type='hidden' value='" . $result['dept_active'] . "'>
            <button name='submitStatus' type='submit'><img src='drawables/icons/" . $iconName . ".svg' alter='Delete'/></button>
            <span>" . $iconName . "</span>
         </form>
         </div>
         </li>
         </ul>";
      }
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
