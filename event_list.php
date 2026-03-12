<?php
    require("connection.php");

    $q_event = $mysqli->query("SELECT * FROM events_tbl ORDER BY event_date_start DESC");
    
    while($f_event = $q_event->fetch_assoc()){
        $event_id = $f_event['event_id'];
        $event_name = $f_event['event_name'];
        $event_img = $f_event['event_img'];
        $event_descrition = $f_event['event_description'];
        $event_date_start = $f_event['event_date_start'];
        $event_time_start = $f_event['event_time_start'];
        $event_date_end = $f_event['event_date_end'];
        $event_time_end = $f_event['event_time_end'];


        ?>
            <div class="event-list">
                <div class="list-col-1">
                    <img src="event_img/<?=$event_img;?>" alt="event">
                    <div class="list-row-1">
                        <p><?= $event_name;?></p>
                        <small><?= $event_date_start;?> | <?= $event_time_start;?> to <?= $event_date_end;?> | <?= $event_time_end;?></small>
                    </div>
                </div>
                <div class="list-col-2">
                    <a href="edit_event.php?eid=<?=$event_id;?>" class="more vertical">
                        <div class="dot dot-1"></div>
                        <div class="dot dot-2"></div>
                        <div class="dot dot-3"></div>
                    </a>
                </div>
            </div>
        <?php
    }
?>