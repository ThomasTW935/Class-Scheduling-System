<?php
session_start();
$sessionID = $_SESSION['id'];
$sessionUsername = $_SESSION['username'];
$sessionType = $_SESSION['type'];
if (empty($_SESSION)) {
   header("Location: ./index.php");
   exit();
}

include './includes/autoloader.inc.php';
$page = $_GET['page'] ?? '1';
$func = new Functions();

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
   <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
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
         echo "<a href='dashboard.php' class='nav__Home'><span>HOME</span></a>";
      } else {
         echo '<div></div>';
      }

      ?>
      <div class='nav__Profile'>
         <a href='./scheduleview.php' class='nav__User'><?php echo $sessionUsername ?></a>
         <ul>
            <li>
               <a href='./profile.php'>Profile</a>
            </li>
            <li>
               <form class="nav__Button" action="./includes/logout.inc.php" method="POST">
                  <button type="submit" name="logout-Button">Log out</button>
               </form>
            </li>
         </ul>
      </div>
   </nav>