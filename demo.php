<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styles/admin.css">
    <script defer src="./scripts/demo.js"></script>
    <title>Document</title>
</head>

<body>

    <?php
    include_once "./includes/autoloader.inc.php";
    $state = 1;
    $page = 1;

    $subjView = new SubjectsView();
    $func = new Functions();
    $results = $subjView->FetchSubjectsByState($state);

    $isArchived = isset($_GET['archive']);
    $table = $func->TableProperties('subj', $results, $isArchived);
    $paginatedResults = $subjView->FetchSubjectsByState($state, $page, $table['limit']);
    $subjView->DisplaySubjects($paginatedResults, $page, $table['totalpages'], $table['destination']);

    ?>



</body>

</html>