<?php

spl_autoload_register("myAutoLoader");

function myAutoLoader($className)
{
   echo "Autoloader";
   //$root = dirname(__FILE__);
   $path = "./classes/";
   $extension = '.class.php';
   $fullPath = $path . $className . $extension;
   if (!file_exists($fullPath)) {
      $fullPath = ".{$fullPath}";
   }
   include_once $fullPath;
}
