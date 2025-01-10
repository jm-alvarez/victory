<?php 
    require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Event</title>
    <link rel="stylesheet" href="css/add_event.css">
</head>
<body>
    <header>
        <h2>Add Event</h2>
    </header>
    
    <form action="" method="post">
       

        <div class="row row-1">
            <label for="event_name" class="lbl-name">Name</label>
            <input type="text" name="event_name" id="event_name" class="event_name" placeholder="Enter event name..." required>
            
        </div>
        
        <div class="row row-2">
            <div class="col col-1">
                <label for="event_date_start">From : </label>
                <input type="date" name="event_date_start" id="event_date_start" class="date" required>
                <input type="time" name="event_time_start" id="event_time_start" class="date" required>
            </div>
            
            <div class="col col-2">
                <label for="event_date_end">To : </label>
                <input type="date" name="event_date_end" id="event_date_end" class="date" required>
                <input type="time" name="event_time_end" id="event_time_end" class="date" required>
            </div>
            
        </div>

        <input type="file" name="event_img" id="event_img" class="add-img" value="event.png">

        <textarea name="event_description" id="event_description" class="ta required" placeholder="Enter description here..."></textarea>
        
        <div class="row row-3">
            <button class="btn btn-add-event" type="submit" value="Add Event" name="add_event">Add Event</button>
            <button class="btn btn-clear" type="reset" value="Clear">Clear</button>
        </div>
        
        <?php
            if(isset($_POST['add_event'])){
                $event_name = $_POST['event_name'];
                $event_description = $_POST['event_description'];
                $event_img = $_POST['event_img'];
                $event_date_start = $_POST['event_date_start'];
                $event_date_end = $_POST['event_date_end'];
                $event_time_start = $_POST['event_time_start'];
                $event_time_end = $_POST['event_time_end'];
                
                $q_add_event = $mysqli->query("INSERT INTO events_tbl SET event_name='$event_name', event_description='$event_description', event_img='$event_img', event_date_start='$event_date_start', event_time_start='$event_time_start', event_date_end='$event_date_end', event_time_end='$event_time_end'");
                if(!$q_add_event){
                    echo $mysqli->error;
                    exit();
                } elseif($mysqli->affected_rows == 0){
                    ?>
                        <script>
                            alert("Failed.");
                        </script>
                    <?php
                } else {
                    ?>
                        <script>
                            alert("Event Added Sucesfully");
                            
                        </script>
                    <?php
                }
            }
        ?>
    </form>
</body>
</html>