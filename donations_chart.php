<?php
    require("connection.php");

    $q_donate = $mysqli->query("SELECT * FROM donations_tbl");
    $amount = 0;
    while($f_donate=$q_donate->fetch_assoc()){
        
    }
                        for($i=1; $i <=12; $i++){
                            $yearNow = date("Y");
                            $q_month[$i] = $mysqli->query("SELECT donation_amount FROM donations_tbl WHERE year='$yearNow' AND month='$i'");
                            if($q_month[$i]){
                                $month[$i] = 0;
                                $amount[$i] = 0;
                                 while($f_month[$i] = $q_month[$i]->fetch_assoc()){
                                    $month[$i]++;
                                    $amount[$i]=$f_month[$i]['donation_amount'];
                                }
                                $amount[$i];
                            }
                            echo "'".$amount[$i]."'".",";
                        }
                        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donations Chart</title>
</head>
<body>
    
<canvas id="donationsChart" width="220" height="100"></canvas>

<script src="node_modules/chart.js/dist/chart.umd.js"></script>
<script>
    var ctx = document.getElementById('donationsChart');
    var chart = new Chart(ctx, {
        type: 'line',

        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets : [{
                label: 'Donations',
                // data: [1000, 2500, 500, 6000, 2000, 1250, 3690, 2400, 6800, 9000, 5400, 2500],
                data: [
                    <?php
                        for($i=1; $i <=12; $i++){
                            $yearNow = date("Y");
                            $q_month[$i] = $mysqli->query("SELECT donation_amount FROM donations_tbl WHERE year='$yearNow' AND month='$i'");
                            if($q_month[$i]){
                                $month[$i] = 0;
                                $amount[$i] = 0;
                                 while($f_month[$i] = $q_month[$i]->fetch_assoc()){
                                    $month[$i]++;
                                    $amount[$i]=$f_month[$i]['donation_amount'];
                                }
                                $amount[$i];
                            }
                            echo "'".$amount[$i]."'".",";
                        }
                        ?>
                ],
            }],
        },
    });
</script>
</body>
</html>