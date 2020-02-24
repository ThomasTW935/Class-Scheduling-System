<?php
   session_start();
   if(!isset($_SESSION['admin'])){
      header("Location: ./index.php");
      exit();
   }
   include './includes/autoloader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="./styles/admin.css"/>
   <script defer src="scripts/script.js"></script>
   <title>Class Scheduling System</title>
</head>
<body>
   <nav class="nav">
      <?php
         $url = $_SERVER['REQUEST_URI'];
         if(!strpos($url, "dashboard")){
            echo "<a href='dashboard.php' class='button back'>BACK</a>";
         }

      ?>
      <form class="nav__Button" action="./includes/logout.inc.php" method="POST">
         <button type="submit" name="logout-Button" class="button">LOG OUT</button>
      </form>
   </nav>