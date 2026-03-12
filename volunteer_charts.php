<?php session_start();
    require("connection.php");
    $q_vol = $mysqli->query("SELECT vid FROM volunteers_tbl");
    $v_count = 0;
    while($f_vol = $q_vol->fetch_assoc()){
        $vol[] = $f_vol;
    }
    // var_dump($vol)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Charts</title>
    <!-- <link rel="stylesheet" href="css/volunteer_charts.css"> -->
</head>
<body>
    <canvas id="tryChart" width="220" height="100"></canvas>

<script src="node_modules/chart.js/dist/chart.umd.js"></script>
<script>
    var ctx = document.getElementById('tryChart');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],
            datasets : [{
                label: 'Volunteers',
                data: [1, 12, 4, 6, 3],
                backgroundColor: ['red', 'green', 'blue', 'yellow', 'pink'],
            }],
        },
    });
</script>
</body>
</html>