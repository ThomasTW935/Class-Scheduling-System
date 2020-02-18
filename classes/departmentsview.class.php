<?php

class DepartmentsView extends Departments{

   public function showDeptFaculty(){
      $results = $this->getDepartmentFaculty();
      foreach($results as $result){
         echo "<ul class='module__List'>
            <li class='module__Item'>". $result['dept_name'] ."</li>
            <li class='module__Item'>". $result['dept_desc'] ."</li>
            <li class='module__Item'><a href=?id='". $result['dept_id'] ."'>Edit</a></li>
            <li class='module__Item'>
               <form action='./includes/departments.inc.php' method='POST'>
                  <input name='id' type='hidden' value='". $result['dept_id'] ."'>
                  <button name='delete' type='submit'>Remove</button>
               </form>
            </li>
         </ul>";
      }
   }
}