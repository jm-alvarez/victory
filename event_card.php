<?php
    require("connection.php");

    $q_event = $mysqli->query("SELECT * FROM events_tbl");
    $cnt = 0;
    while($f_event = $q_event->fetch_assoc()) {
        $cnt++;

        ?>
            <div class="card card-<?=$cnt;?>">
                    <img src="event_img/<?=$f_event['event_img'];?>" alt="event image" class="card-img">
                    <div class="card-body" style="padding: 20px;">
                        <h3 class="card-title">
                            <?=$f_event['event_name'];?>
                        </h3>
                        <div class="date-container">
                            <small>From: <?=$f_event['event_date_start'];?> | <?=$f_event['event_time_start'];?> </small>
                        <small>To: <?=$f_event['event_date_end'];?> | <?=$f_event['event_time_end'];?>
                        </small>
                        </div>
                        
                        <details>
                            <summary>Read Description...</summary>
                            <p><?=$f_event['event_description'];?></p>
                        </details>
                    </div>
            </div>
        <?php
    }
?>