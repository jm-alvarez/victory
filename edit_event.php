<?php session_start();
    require("connection.php");
?>
<?php
    if(isset($_GET['eid'])){
        $eid=$_GET['eid'];
        $q_event = $mysqli->query("SELECT * FROM events_tbl WHERE event_id = $eid");
        $event_fetch = $q_event->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Event</title>
    <link rel="stylesheet" href="css/edit_event.css">
</head>
<body>
<div class="edit-event-container">    
    <header>
        <button class="btn-close" onclick="cancelChanges()">X</button>
        <h2>Edit Event</h2>
    </header>
    
    <form action="" method="post">
       

        <div class="row row-1">
            <label for="event_name" class="lbl-name">Name</label>
            <input type="text" name="event_name" id="event_name" class="event_name" placeholder="Enter event name..." value="<?=$event_fetch['event_name'];?>">
            
        </div>
        
        <div class="row row-2">
            <div class="col col-1">
                <label for="event_date_start">From : </label>
                <input type="date" name="event_date_start" id="event_date_start" class="date" value="<?=$event_fetch['event_date_start'];?>">
                <input type="time" name="event_time_start" id="event_time_start" class="date" value="<?=$event_fetch['event_time_start'];?>">
            </div>
            
            <div class="col col-2">
                <label for="event_date_end">To : </label>
                <input type="date" name="event_date_end" id="event_date_end" class="date" value="<?=$event_fetch['event_date_end'];?>">
                <input type="time" name="event_time_end" id="event_time_end" class="date" value="<?=$event_fetch['event_time_end'];?>">
            </div>
            
        </div>

        <input type="file" name="event_img" id="event_img" class="add-img" ><span value="<?$event_fetch['event_img']?>"><?=$event_fetch['event_img'];?></span>

        <textarea name="event_description" id="event_description" class="ta required" placeholder="Enter description here..."><?=$event_fetch['event_description'];?></textarea>
        
        <div class="row row-3">
            <button class="btn btn-add-event" type="submit" value="Update Event" name="update_event">Update Event</button>
            <a href="delete_event.php?eid=<?=$eid;?>&con=delete" class="btn-delete-event">Delete</a>
        </div>
        
        <?php
            if(isset($_POST['update_event'])){
                $event_name = $_POST['event_name'];
                $event_description = $_POST['event_description'];
                $event_img = $_POST['event_img'];
                $event_date_start = $_POST['event_date_start'];
                $event_date_end = $_POST['event_date_end'];
                $event_time_start = $_POST['event_time_start'];
                $event_time_end = $_POST['event_time_end'];
                
                if(!empty($event_img)){
                    $q_edit_event = $mysqli->query("UPDATE events_tbl SET event_name='$event_name', event_description='$event_description', event_img='$event_img', event_date_start='$event_date_start', event_time_start='$event_time_start', event_date_end='$event_date_end', event_time_end='$event_time_end' WHERE event_id='$eid'");
                    if(!$q_edit_event){
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
                                window.location="admin.php";
                            </script>
                        <?php
                    }
                } elseif(empty($event_img)){
                    $q_edit_event = $mysqli->query("UPDATE events_tbl SET event_name='$event_name', event_description='$event_description', event_date_start='$event_date_start', event_time_start='$event_time_start', event_date_end='$event_date_end', event_time_end='$event_time_end' WHERE event_id='$eid'");
                    if(!$q_edit_event){
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
                                window.location="admin.php";
                            </script>
                        <?php
                    }
                }
            }
        ?>
    </form>
</div>

<script>
    function cancelChanges(){
        var con = confirm("Are you sure you want to cancel this update?");
            if(con){
                <?php
                    unset($_SESSION['eid']);  
                ?>
                window.location = "admin.php";
            }
    };
</script>
</body>
</html>