<?php
$url = $_SERVER['REQUEST_URI'];
$query = parse_url($url, PHP_URL_QUERY);
parse_str($query, $errors);
$errorPassword = (isset($errors['errorPassword'])) ? "*{$errors['errorPassword']}" : '';
$errorUsername = (isset($errors['errorUsername'])) ? "*{$errors['errorUsername']}" : '';
$username = (isset($errors['username'])) ? "{$errors['username']}" : '';

include "./includes/autoloader.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login</title>
   <link rel="stylesheet" href="styles/index.css">
   <script defer src="scripts/index.js"></script>
</head>

<body>
   <nav class='nav'>
      <ul>
         <li><a href='index.php'><img src="./drawables/images/STI_LOGO.png" alt="STI"></a></li>
         <li><button onclick='ToggleModalForm()'>Login</button></li>
      </ul>
   </nav>
   <form class='liveSelect__Form'>
      <select class='liveSelect' name='selectLevel' id='selectLevel'>
         <option value='course'>College</option>
         <option value='strand'>Senior High School</option>
      </select>
      <select class='liveSelect' name='selectDept' id='selectDept'>
         <?php

         $deptView = new DepartmentsView();
         $depts = $deptView->FetchDeptsWithSect("course", 1);
         foreach ($depts as $dept) {
            $selected = ($depts[0]['dept_id'] == $dept['dept_id']) ? "selected" : "";
            echo "<option value='{$dept['dept_id']}' $selected>{$dept['dept_desc']}</option>";
         }

         ?>
      </select>
      <select class='liveSelect' name='selectSection' id='selectSection'>
         <?php

         $sectView = new SectionsView();
         $sects = $sectView->FetchSectionByDept($depts[0]['dept_id']);
         foreach ($sects as $sect) {
            echo "<option value='{$sect['sect_id']}'>{$sect['sect_name']}</option>";
         }

         ?>

      </select>
   </form>

   <div class="module__Content">

   </div>

   <form class="module__Form" action="includes/login.inc.php" method="POST">
      <section class="form__Title">
         <label>Log in</label>
         <button class='form__Close' type='button' onclick='ToggleModalForm()'>X</button>
      </section>
      <fieldset class='form__Content'>
         <label for='usename'>User ID</label>
         <input type="text" name="username" id="username" value='<?php echo $username ?>' autofocus autocomplete="username" required>
         <span class='error'><?php echo "$errorUsername"; ?></span>
         <label for='password'>Password</label>
         <input type="password" name="current-password" id="password" autocomplete="off" required>
         <span class='error'><?php echo $errorPassword; ?></span>
         <button class="form__Button" type="submit" name="submit">Log in</button>
      </fieldset>
   </form>
   <div class='form__Background' onclick='ToggleModalForm()'></div>
</body>

</html>