<?php

function BuildQuery($errors, $data)
{
  foreach ($errors as $errorKey => $errorValue) {
    foreach ($data as $key => $value) {
      $needle = strtolower($key);
      $haystack = strtolower($errorKey);
      if ((strpos($haystack, $needle) !== false)) {
        unset($data[$key]);
      }
    }
  }
  $query = '&' . http_build_query($errors) . '&' . http_build_query($data);
  return $query;
}
