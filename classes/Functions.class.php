<?php

class Functions
{
  public function BuildQuery($errors, $data)
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
  public function BuildPagination($currentPage, $pagesCount, $destination)
  {
    echo "<div class='module__Pages'>";
    echo "<ul>";
    if ($pagesCount > 1) {
      $previous = $currentPage - 1;
      $checkPrevious = ($currentPage > 1) ? "" : " class='disabled'";
      echo "<li><a href='$destination$previous' $checkPrevious>Previous</a></li>";
    }
    if ($pagesCount > 1 && $pagesCount <= 10) {

      for ($i = 1; $i <= $pagesCount; $i++) {
        $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
        echo "<a $activePage>$i</a>";
      }
    } else if ($pagesCount > 10) {
      $secondLast = $pagesCount - 1;
      $firstNums = "<li><a href='{$destination}1'>1</a></li>
                  <li><a href='{$destination}2'>2</a></li>";
      $lastNums =  "<li><a href='$destination$secondLast'>$secondLast</a></li>
                  <li><a href='$destination$pagesCount'>$pagesCount</a></li>";
      $separator = "<li><a>...</a></li>";

      if ($currentPage <= 4) {
        for ($i = 1; $i < 8; $i++) {
          $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
          echo "<li><a $activePage>$i</a></li>";
        }
        echo $separator;
        echo $lastNums;
      } else if ($currentPage > 4 && $currentPage < $pagesCount - 4) {
        echo $firstNums;
        echo $separator;
        for ($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
          $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
          echo "<li><a $activePage>$i</a></li>";
        }
        echo $separator;
        echo $lastNums;
      } else {
        echo $firstNums;
        echo $separator;
        for ($i = $pagesCount - 6; $i <= $pagesCount; $i++) {
          $activePage = ($currentPage != $i) ? "href='$destination$i'" : "class='active'";
          echo "<li><a $activePage>$i</a></li>";
        }
      }
    }
    if ($pagesCount > 1) {
      $next = $currentPage + 1;
      $checkNext = ($currentPage < $pagesCount) ? "" : " class='disabled'";
      echo "<li><a href='$destination$next' $checkNext>Next</a></li>";
    }
    echo "</ul>";
    echo "</div>";
  }

  public function TableProperties($type, $data, $archived = false, $search = '')
  {
    $newArray = [];
    $isSearch = (!empty($search)) ? "q=$search&" : "";
    if ($type == 'prof') {
      $limit = 11;
      $destination = (!$archived) ? "?{$isSearch}page=" : "?archive&{$isSearch}page=";
    } else if ($type == 'room') {
      $limit = 11;
      $destination = (!$archived) ? "?{$isSearch}page=" : "?archive&{$isSearch}page=";
    } else if ($type == 'sect') {
      $limit = 4;
      $destination = (!$archived) ? "?{$isSearch}page=" : "?archive&{$isSearch}page=";
    } else if ($type == 'subj') {
      $limit = 11;
      $destination = (!$archived) ? "?{$isSearch}page=" : "?archive&{$isSearch}page=";
    } else if ($type == 'user') {
      $limit = 11;
      $destination = (!$archived) ? "?{$isSearch}page=" : "?archive&{$isSearch}page=";
    }
    if ($type == 'faculty') {
      $limit = 11;
      $destination = (!$archived) ?  "?dept=faculty&{$isSearch}page=" : "?dept=faculty&archive&{$isSearch}page=";
    } else if ($type == 'course') {
      $limit = 11;
      $destination = (!$archived) ?  "?dept=course&{$isSearch}page=" : "?dept=course&archive&{$isSearch}page=";
    } else if ($type == 'strand') {
      $limit = 11;
      $destination = (!$archived) ?  "?dept=strand&{$isSearch}page=" : "?dept=strand&archive&{$isSearch}page=";
    }


    $totalPages = ceil(count($data) / $limit);
    $newArray['totalpages'] = $totalPages;
    $newArray['limit'] = $limit;
    $newArray['destination'] = $destination;

    return $newArray;
  }

  public function GenerateCellValue($type, $data)
  {
    $subjDesc = $data['subj_desc'] ?? '';
    $sectName = $data['sect_name'] ?? '';
    $lastName = $data['last_name'] ?? '';
    $roomName = $data['rm_name'] ?? '';
    $newArray = [];
    if ($type == 'sect') {
      array_push($newArray, $subjDesc);
      array_push($newArray, $roomName);
      array_push($newArray, $lastName);
    } else if ($type == 'prof') {
      array_push($newArray, $subjDesc);
      array_push($newArray, $roomName);
      array_push($newArray, $sectName);
    } else if ($type == 'subj') {
      array_push($newArray, $lastName);
      array_push($newArray, $roomName);
      array_push($newArray, $sectName);
    } else if ($type == 'room') {
      array_push($newArray, $subjDesc);
      array_push($newArray, $lastName);
      array_push($newArray, $sectName);
    }
    return $newArray;
  }
}
