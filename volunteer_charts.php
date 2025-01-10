<?php session_start();
    require("connection.php");
    $q_vol = $mysqli->query("SELECT * FROM volunteers_tbl");
    $v_count = 0;
    // while($f_vol = $q_vol->fetch_assoc()){
        
    //     $date = $f_vol['reg_date'];

    //     $volRegMonth = date("M", strtotime($date));
    //     $regMonth = "'"."$volRegMonth"."'" . ",";
        
    //     $ndate = "'"."$date"."'" . ",";

    //    echo "$regMonth";
    // }

    $q_jan = $mysqli->query("SELECT reg_month, reg_year FROM volunteers_tbl WHERE reg_month='1'");
        if($q_jan){
            $jan = 0;
             while($f_jan = $q_jan->fetch_assoc()){
            $jan++;
        }   
    }

    $q_feb = $mysqli->query("SELECT reg_month FROM volunteers_tbl WHERE reg_month='2'");
        if($q_feb){
            $jan = 0;
             while($f_jan = $q_jan->fetch_assoc()){
            $jan++;
        }
    }

    for($i = 1; $i <= 12; $i++) {
        $q_month[$i] = $mysqli->query("SELECT reg_month FROM volunteers_tbl WHERE reg_month='$i'");
        if($q_month[$i]){
            $month[$i] = 0;
             while($f_month[$i] = $q_month[$i]->fetch_assoc()){
            $month[$i]++;
            }
        }

        $vol_stats = "'".$month[$i]."'".",";
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
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets : [{
                label: 'Volunteers', data: [<?php
                        for($i = 1; $i <= 12; $i++) {
                            $yearNow = date("Y");
                            $q_month[$i] = $mysqli->query("SELECT reg_month FROM volunteers_tbl WHERE reg_year='$yearNow' AND reg_month='$i'");
                            if($q_month[$i]){
                                $month[$i] = 0;
                                 while($f_month[$i] = $q_month[$i]->fetch_assoc()){
                                $month[$i]++;
                                }
                            }
                            
                            echo "'".$month[$i]."'".",";
                        }
                    ?>
                ],backgroundColor: ['red', 'green', 'blue', 'yellow', 'pink'],
            }],
        },
    });
</script>
</body>
</html>