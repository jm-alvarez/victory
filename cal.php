<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .calendar {
            display: inline-block;
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <?php
    // Get current month and year or use query parameters
    $month = isset($_GET['month']) ? intval($_GET['month']) : date('m');
    $year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');

    // Adjust month and year for next/previous navigation
    if ($month < 1) {
        $month = 12;
        $year--;
    } elseif ($month > 12) {
        $month = 1;
        $year++;
    }

    // First day of the month
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    $daysInMonth = date('t', $firstDayOfMonth);
    $monthName = date('F', $firstDayOfMonth);
    $startDay = date('w', $firstDayOfMonth);
    ?>

    <h1>PHP Calendar</h1>
    <div>
        <a href="?month=<?= $month - 1; ?>&year=<?= $year; ?>">&laquo; Previous</a>
        <span><?= $monthName . ' ' . $year; ?></span>
        <a href="?month=<?= $month + 1; ?>&year=<?= $year; ?>">Next &raquo;</a>
    </div>

    <div class="calendar">
        <table>
            <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $currentDay = 1;
                echo '<tr>';

                // Print empty cells for days before the first day of the month
                for ($i = 0; $i < $startDay; $i++) {
                    echo '<td></td>';
                }

                // Print days of the month
                for ($day = $startDay; $day < 7; $day++) {
                    echo '<td>' . $currentDay++ . '</td>';
                }

                echo '</tr>';

                // Print the rest of the weeks
                while ($currentDay <= $daysInMonth) {
                    echo '<tr>';
                    for ($day = 0; $day < 7; $day++) {
                        if ($currentDay <= $daysInMonth) {
                            echo '<td>' . $currentDay++ . '</td>';
                        } else {
                            echo '<td></td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
