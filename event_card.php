<?php
    require("connection.php");

    $q_event = $mysqli->query("SELECT * FROM events_tbl");
    $cnt = 0;
    while($f_event = $q_event->fetch_assoc()) {

        
        $cnt++;
        $event_id = $f_event['event_id'];

        ?>
            <div class="card card-<?=$event_id;?>" id="card-<?=$event_id;?>" name="open-card" >
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
<!--                         
                        <details>
                            <summary>Read Description...</summary>
                            <p><?=$f_event['event_description'];?></p>
                        </details> -->
                    </div>
            </div>
        <?php

        ?>
            <script>
                console.log("<?=$event_id;?>");
                var $enum = "<?=$event_id;?>";

                
                var eventCard = document.getElementById('card-<?=$event_id;?>');

                eventCard.addEventListener("click", (e)=>{
                    const eventFrameContainer = document.getElementById('event-frame-container');
                    const eventFrame = document.getElementById('event-frame');


                        eventFrameContainer.classList.add('event-container-active');
                        eventFrameContainer.innerHTML= `
                        
                        <div class="frame-container" style="background-image: url('./event_img/<?=$f_event['event_img'];?>');background-size: cover;background-position: center;background-color: #eee;">
                            <div class="event-frame-header">
                                <button class="cross" id="close-event-frame">X</button>
                                <h4><?=$f_event['event_name'];?></h4>
                            </div>
                            <div class="event-body">
                                <div class="event-image-container">
                                    <img src="event_img/<?=$f_event['event_img'];?>" alt="event-img" class="event-img">
                                </div>
                                <p class="event-date">Start: <?=$f_event['event_date_start'];?> | <?=$f_event['event_time_start'];?></p>
                                <p class="event-date">End: <?=$f_event['event_date_end'];?> | <?=$f_event['event_time_end'];?></p>
                                <p class="event-description"><?=$f_event['event_description'];?></p>
                                <div class="btn-container">
                                <?php
                                    $j_query = $mysqli->query("SELECT * FROM participants_tbl WHERE uid='$uid' AND eid='$event_id'");
                                    $j_fetch = $j_query->fetch_assoc();

                                        if($j_query->num_rows == 0){
                                            ?>
                                            <form method="POST">
                                                <button class="btn-join" name="pre-register-<?=$event_id;?>">Pre-Register</button>
                                                <?php
                                                    if(isset($_POST['pre-register-'.$event_id])){
                                                        $mysqli->query("INSERT INTO participants_tbl SET uid='$uid', eid='$event_id'");
                                                    }
                                                ?>
                                            </form>
                                            <?php
                                        } else {
                                            ?>
                                            <form method="POST">
                                                <button class="btn-unreg" name="unregister-<?=$event_id;?>">Unregister</button>
                                                <?php
                                                    if(isset($_POST['unregister-'.$event_id])){
                                                        $mysqli->query("DELETE FROM participants_tbl WHERE uid='$uid' AND eid='$event_id'");
                                                    }
                                                ?>
                                            </form>
                                            <?php
                                        }
                                ?>
                                

                            </div>
                            </div>
                            
                        </div>
                        `;
                        
                        const closeEvent = document.getElementById('close-event-frame');
                        closeEvent.addEventListener("click", (e)=>{
                            eventFrameContainer.classList.remove('event-container-active');
                            eventFrameContainer.innerHTML = "";
                        });
                });
            </script>
        <?php
    }
?>