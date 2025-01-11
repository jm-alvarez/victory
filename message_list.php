<?php
    require("connection.php");

    if(isset($_GET['msg_page_no']) && isset($_GET['msg_page_no']) !== ""){
        $page_no = $_GET['msg_page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 5;
    $offset =($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $result_count = $mysqli->query("SELECT COUNT(*) AS total_records FROM db_victory.comms_tbl");
    $records = $result_count->fetch_assoc();
    $total_records = $records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    $q_mlist = $mysqli->query("SELECT * FROM comms_tbl INNER JOIN users_tbl ON comms_tbl.uid = users_tbl.uid ORDER BY sent_date DESC LIMIT $offset, $total_records_per_page");
    
?>
<div class="messages shadow">
    <h4>Messages</h4>
    <div class="messages-container">
        <?php
            while($f_mlist = $q_mlist->fetch_assoc()){
                $m_name = $f_mlist['ufname'] . " " . $f_mlist['mi']. " " . $f_mlist['ulname'];
                $m_message = $f_mlist['message'];
                $m_profile = $f_mlist['profile_pic'];
                $m_date = $f_mlist['sent_date'];
                $m_uid = $f_mlist['uid'];
                $m_id = $f_mlist['message_id'];
                ?>
                    <div class="messages-box">
                        <div class="messages-col-1">
                           <img src="profile_pics/<?=$m_profile;?>" alt="user-img" class="user-img">
                            <div class="s-info">
                                <p class="username"><?=$m_name;?></p>
                                <small><?=$m_date;?></small>
                                <details>
                                    <summary>Show message...</summary>
                                    <p class="s-message"><?=$m_message;?></p>
                                </details>
                            </div>
                        </div>
                        <!-- <div class="messages-col-2">
                                <a href="admin_reply.php?uid=<?=$m_uid;?>&mid=<?=$m_id;?>" type="button" class="btn btn-reply">Reply</a>
                                <button type="button" class="btn btn-archive">Archive</button>
                        </div> -->
                    </div>
                <?php
            }
        ?>
    </div>
</div>

<div class="paging">
    <ul class="pagination">
        <li class="page-item"><a class="page-link <?=($page_no <= 1) ? 'disabled' : '';?>" <?=($page_no > 1) ? 'href=?msg_page_no='.$previous_page : '';?>>Previous</a></li>
        <li class="page-item"><a class="page-link">1</a></li>
        <li class="page-item"><a class="page-link">2</a></li>
        <li class="page-item"><a class="page-link">3</a></li>
        <li class="page-item"><a class="page-link  <?=($page_no >= $total_no_of_pages) ? 'disabled' : '';?>" <?=($page_no < $total_no_of_pages) ? 'href=?msg_page_no='.$next_page : '';?>>Next</a></li>
    </ul>
    <div class="total-page">
        <strong>
            Page <?=$page_no;?> of <?=$total_records_per_page;?>
        </strong>
    </div>
</div>