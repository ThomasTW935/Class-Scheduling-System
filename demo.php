<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="./styles/demo.css">
   <script defer src="./scripts/demo.js"></script>
   <title>Document</title>
</head>

<body>
   <?php


   $timeSlots = ["07:00", "08:00", "08:30", "10:00"];
   $data = [];
   foreach ($timeSlots as $timeSlot) {
      if ($timeSlot == "10:00") {
         $data[$timeSlot] = "<li>Daryl</li>";
      } else {
         $data[$timeSlot] = "<li>Thomas</li>";
      }
   }

   var_dump($data);

   $data['07:00'] = "<li>Christine</li>";

   foreach ($data as $key => $value) {
      echo $value;
   }

   ?>

   <br>
   <br>




</body>

</html>
