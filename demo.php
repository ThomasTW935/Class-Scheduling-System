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
   <form action="includes/demo.inc.php" method='POST'>
      <input name='datalist' list='brow'>
      <datalist id='brow'>
         <option value="Firefox">Firefox</option>
         <option value="Chrome">Chrome</option>
         <option value="Safari">Safari</option>
      </datalist>
      <button type="submit">Submit</button>
   </form>

</body>

</html>