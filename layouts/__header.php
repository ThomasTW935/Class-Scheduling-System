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
      <div class="nav__Burger">
         <div class="nav__Burger--Line"></div>
         <div class="nav__Burger--Line"></div>
         <div class="nav__Burger--Line"></div>
      </div>
      <ul class="nav__List">
         <li class="nav__List--Item"><a href="./dashboard.php">Dashboard</a></li>
         <li class="nav__List--Item"><a href="./sections.php">Sections</a></li>
         <li class="nav__List--Item"><a href="./rooms.php">Room</a></li>
         <li class="nav__List--Item"><a href="./professors.php">Professors</a></li>
         <li class="nav__List--Item"><a href="./subjects.php">Subjects</a></li>
      </ul>
      <form class="nav__Button" action="./includes/logout.inc.php" method="POST">
         <button type="submit" name="logout-Button" >Logout</button>
      </form>
   </nav>