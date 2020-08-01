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

    include './includes/autoloader.inc.php';
    $schedView = new SchedulesView();

    $daysWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    ?>

    <table class='schedules__Table'>
        <thead>
            <tr>
                <th></th>
                <?php
                foreach ($daysWeek as  $dayWeek) {
                    echo "<th>$dayWeek</th>";
                }
                ?>
            </tr>
        </thead>
        <?php
        $newStartTime = strtotime('07:00');
        $newEndTime = strtotime('17:00');
        $jumpTime = 30;
        $values = array();
        $results = $schedView->FetchTimeSlotValue('room', 9);
        var_dump($results);
        for ($i = $newStartTime; $i < $newEndTime; $i += 15 * 60) {
            $timeDisplay = (($i + $jumpTime * 60) - $newStartTime) / 60;
            if ($timeDisplay % $jumpTime == 0) {
                $toTime = $i + $jumpTime * 60;

                $time = date('g:i A', $i);
                $values[$time] = array();
                $cellValue =  $time . " - " . date('g:i A', $toTime);
                array_push($values[$time], $cellValue);
                foreach ($daysWeek as $days) {
                    $cellValue = '';
                    foreach ($results as $result) {
                        if ($days == $result['sched_day']) {
                            if ($i >= strtotime($result['sched_from']) && $i < strtotime($result['sched_to'])) {
                                $cellValue = "<div>
                                <span>{$result['subj_desc']}</span>
                                <span>{$result['sect_name']}</span> 
                                <span>{$result['last_name']}</span>
                                </div>";
                            }
                        }
                    }
                    array_push($values[$time], $cellValue);
                }
            }
        }
        echo "<tbody>";
        foreach ($values as $key => $value) {
            echo "<tr>";
            foreach ($value as $x) {
                if (!empty($x)) {
                    echo "<td class='slot'><a>$x</a></td>";
                } else {
                    echo "<td>$x</td>";
                }
            }
            echo "</tr>";
        }
        echo "</tbody>";

        ?>
    </table>


</body>

</html>