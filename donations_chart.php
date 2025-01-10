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
                data: [1000, 2500, 500, 6000, 2000, 1250, 3690, 2400, 6800, 9000, 5400, 2500],
            }],
        },
    });
</script>
</body>
</html>