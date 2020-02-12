<?php

   spl_autoload_register("myAutoLoader");

   function myAutoLoader($className){
      $root = dirname(__FILE__);
      $path = "classes/";
      if(strpos($root,"includes")){
         $path = "../classes/";
      }
      $extension = '.class.php';
      $fullPath = $path . $className . $extension;
      include_once $fullPath;
   }