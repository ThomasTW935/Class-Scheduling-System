<?php

spl_autoload_register("myAutoLoader");

function myAutoLoader($className)
{
   //$root = dirname(__FILE__);
   $path = "./classes/";
   $extension = '.class.php';
   $fullPath = $path . $className . $extension;
   if (!file_exists($fullPath)) {
      $fullPath = ".{$fullPath}";
   }
   echo "Path: $fullPath";
   $fileExist = file_exists($fullPath);
   echo "<br>File Exist: $fileExist";
   include_once $fullPath;
}
