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
function BuildPagination($currentPage, $pagesCount, $destination)
{
  if ($pagesCount > 1) {
    $previous = $currentPage - 1;
    $checkPrevious = ($currentPage > 1) ? "" : " class='disabled'";
    echo "<a href='$destination$previous' $checkPrevious>Previous</a>";
  }
  if ($pagesCount > 1 && $pagesCount <= 10) {

    for ($i = 1; $i <= $pagesCount; $i++) {
      $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
      echo "<a $activePage>$i</a>";
    }
  } else if ($pagesCount > 10) {
    $secondLast = $pagesCount - 1;

    if ($currentPage <= 4) {
      for ($i = 1; $i < 8; $i++) {
        $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
        echo "<a $activePage>$i</a>";
      }
      echo "<a>...</a>";
      echo "<a href='$destination$secondLast'>$secondLast</a>";
      echo "<a href='$destination$pagesCount'>$pagesCount</a>";
    } else if ($currentPage > 4 && $currentPage < $pagesCount - 4) {
      echo "<a href='{$destination}1'>1</a>";
      echo "<a href='{$destination}2'>2</a>";
      echo "<a>...</a>";
      for ($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
        $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
        echo "<a $activePage>$i</a>";
      }
      echo "<a>...</a>";
      echo "<a href='$destination$secondLast'>$secondLast</a>";
      echo "<a href='$destination$pagesCount'>$pagesCount</a>";
    } else {
      echo "<a href='{$destination}1'>1</a>";
      echo "<a href='{$destination}2'>2</a>";
      echo "<a>...</a>";
      for ($i = $pagesCount - 6; $i <= $pagesCount; $i++) {
        $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
        echo "<a $activePage>$i</a>";
      }
    }
  }
  if ($pagesCount > 1) {
    $next = $currentPage + 1;
    $checkNext = ($currentPage < $pagesCount) ? "" : " class='disabled'";
    echo "<a href='$destination$next' $checkNext>Next</a>";
  }
}
