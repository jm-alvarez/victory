<?php
    require("connection.php");

    if(isset($_GET['eid']) && isset($_GET['eid']) !== ""){
        $event_id = $_GET['eid'];
    }
    if(isset($_GET['page_no']) && isset($_GET['page_no']) !== ""){
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 10;
    $offset =($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $result_count = $mysqli->query("SELECT COUNT(*) AS total_records FROM db_victory.participants_tbl WHERE eid=$event_id");
    $records = $result_count->fetch_assoc();
    $total_records = $records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);


    $q_epart = $mysqli->query("SELECT * FROM participants_tbl JOIN users_tbl ON participants_tbl.uid=users_tbl.uid JOIN events_tbl ON participants_tbl.eid=events_tbl.event_id WHERE eid=$event_id LIMIT $offset, $total_records_per_page");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Participants List</title>
    <link rel="stylesheet" href="css/event_participants.css">
</head>
<body>
    <div class="container">
        <h1>Event Participants</h1>
        <div class="pl-head">
            <span class="p-name-header">Name</span>
        </div>
        <?php
            $cnt = 0;
            while($f_epart = $q_epart->fetch_assoc()) {
                $cnt++;
                ?>
                    <div class="participant-container">
                        <div class="p-card">
                            <div class="participant-name-container">
                                <p class="p-name"><?=$f_epart['ufname'];?> <?=$f_epart['mi'];?> <?=$f_epart['ulname'];?></p>
                            </div>
                            <div class="btn-container">
                                <a href="unreg.php?pid=<?=$f_epart['participant_id'];?>&con=delete" class="btn btn-unreg">Unregister</a>
                                <?=$f_epart['participant_id'];?>
                               
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>

        <nav>
            <ul class="pagination">
                <li class="page-item"><a class="page-link <?=($page_no <= 1) ? 'disabled' : '';?>" <?=($page_no > 1) ? 'href=?eid='. $event_id .'&page_no='.$previous_page : '';?>>Previous</a></li>
                <li class="page-item"><a class="page-link">1</a></li>
                <li class="page-item"><a class="page-link">2</a></li>
                <li class="page-item"><a class="page-link">3</a></li>
                <li class="page-item"><a class="page-link  <?=($page_no >= $total_no_of_pages) ? 'disabled' : '';?>" <?=($page_no < $total_no_of_pages) ? 'href=?eid='. $event_id .'&page_no='.$next_page : '';?>>Next</a></li>
            </ul>
            <div class="total-page">
            <strong>
                Page <?=$page_no;?> of <?=$total_records_per_page;?>
            </strong>
        </div>
        </nav>
        
    </div>
</body>
</html>