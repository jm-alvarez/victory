<?php
    require("connection.php");
    include("calendar.php");
    
    
    
        $q_event = $mysqli->query("SELECT * FROM events_tbl");
        $yearNow = date("Y");   
        $monthNow = date("m");
        $dayNow = date("d D");
        $hourNow = date("g")+8-12;
        $minuteNow = date(":i a");
        

        $calendar = new Calendar($yearNow.'-'.$monthNow.'-'.$dayNow);
        
        while($f_event = $q_event->fetch_assoc()){
            $event_name = $f_event['event_name'];
            $event_descrition = $f_event['event_description'];
            $event_date_start = $f_event['event_date_start'];
            $event_time_start = $f_event['event_time_start'];
            $event_date_end = $f_event['event_date_end'];
            $event_time_end = $f_event['event_time_end'];

            

            $calendar->add_event($event_name, $event_date_start, 1, 'blue');
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/calendar_page.css">
    <link rel="stylesheet" href="css/calendar.css">
</head>
<body>

    <?=$calendar?>
    
</body>
</html>