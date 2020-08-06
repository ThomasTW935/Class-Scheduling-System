<?php
session_start();
$sessionType = $_SESSION['type'];
$sessionID = $_SESSION['id'];
if (empty($_SESSION)) {
   header("Location: ./index.php");
   exit();
}
include './includes/autoloader.inc.php';
$page = $_GET['page'] ?? '1';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="./styles/reset.css" />
   <link rel="stylesheet" href="./styles/admin.css" />
   <link rel="stylesheet" media='print' href="./styles/print.css" />
   <script defer src="scripts/script.js"></script>
   <script defer src="scripts/schedule.js"></script>
   <title>Class Scheduling System</title>
</head>

<body>
   <nav class="nav">
      <?php
      $url = $_SERVER['REQUEST_URI'];
      if (!strpos($url, "dashboard") && !strpos($url, "scheduleview")) {
         echo "<a href='dashboard.php' class='button back'>HOME</span></a>";
      } else {
         echo '<div></div>';
      }

      ?>
      <form class="nav__Button" action="./includes/logout.inc.php" method="POST">
         <button type="submit" name="logout-Button" class="button">LOG OUT</button>
      </form>
   </nav>