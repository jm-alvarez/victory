<?php
    require("connection.php");

    if(isset($_GET['event_page_no']) && isset($_GET['event_page_no']) !== ""){
        $page_no = $_GET['event_page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 5;
    $offset =($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $result_count = $mysqli->query("SELECT COUNT(*) AS total_records FROM db_victory.events_tbl");
    $records = $result_count->fetch_assoc();
    $total_records = $records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    $q_event = $mysqli->query("SELECT * FROM events_tbl ORDER BY event_date_start DESC LIMIT $offset, $total_records_per_page");
    
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
            <div class="event-list" id="event-list-<?=$event_id;?>">
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

            <script>

                var eventList = document.getElementById('event-list-<?=$event_id;?>');
                

                eventList.addEventListener("click", (e)=>{
                    var eventContainer = document.getElementById('event-frame-container');

                    eventContainer.classList.add('event-container-active');
                    eventContainer.innerHTML = `
                    <div class="event-con-row">
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
                            </div>
                            
                        </div>
                        <div class="ep-container">
                            <div class="ep-body">
                                <iframe src="" frameborder="0" id="ep-frame"></iframe>
                            </div>
                        </div>
                    </div>
                    `;
                    var epFrame = document.getElementById('ep-frame');
                    epFrame.src="event_participants_list.php?eid=<?=$event_id;?>&page=1";



                    const closeEvent = document.getElementById('close-event-frame');
                    closeEvent.addEventListener("click", (e)=>{
                        eventContainer.classList.remove('event-container-active');
                        eventContainer.innerHTML = "";
                    });
                });

            </script>
        <?php
    }
?>

<div class="paging">
    <ul class="pagination">
        <li class="page-item"><a class="page-link <?=($page_no <= 1) ? 'disabled' : '';?>" <?=($page_no > 1) ? 'href=?event_page_no='.$previous_page : '';?>>Previous</a></li>
        <li class="page-item"><a class="page-link">1</a></li>
        <li class="page-item"><a class="page-link">2</a></li>
        <li class="page-item"><a class="page-link">3</a></li>
        <li class="page-item"><a class="page-link  <?=($page_no >= $total_no_of_pages) ? 'disabled' : '';?>" <?=($page_no < $total_no_of_pages) ? 'href=?event_page_no='.$next_page : '';?>>Next</a></li>
    </ul>
    <div class="total-page">
        <strong>
            Page <?=$page_no;?> of <?=$total_records_per_page;?>
        </strong>
    </div>
</div>