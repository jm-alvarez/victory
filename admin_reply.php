<?php session_start();
    require("connection.php");
    $s_uid = $_SESSION['uid'];
?>
<?php
    if(isset($_GET['uid']) and isset($_GET['mid'])){
        $m_uid = $_GET['uid'];
        $mid = $_GET['mid'];
        $q_msg = $mysqli->query("SELECT * FROM comms_tbl INNER JOIN users_tbl ON comms_tbl.uid = $m_uid WHERE message_id='$mid'");
        $msg_fetch = $q_msg->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply</title>
    <link rel="stylesheet" href="css/admin_reply.css">
</head>
<body>
    <div class="reply-container">
    <header>
        <button class="btn-close" onclick="cancelChanges()">X</button>
        <h2>Reply</h2>
    </header>
    
    <form action="" method="post">
       

        <div class="row row-1">
            <label for="sender_name" class="sender-name">From</label>
            <input type="text" name="sender_name" id="sender_name" class="sender_name" value="<?=$msg_fetch['ufname'];?> <?=$msg_fetch['mi'];?> <?=$msg_fetch['ulname'];?>" disabled>
            <input type="text" name="m-type" id="m-type" class="m-type" value="<?=$msg_fetch['message_type'];?>" disabled>
        </div>

        <div class="msg-container">
            <h5>Message: </h5>
            <div class="msg-card">
                <p class="msg-text"><?=$msg_fetch['message'];?></p>
                <small class="msg-date"><?=date("h:i  D,  M | Y", strtotime($msg_fetch['sent_date']));?></small>
            </div>
        </div>
           <textarea name="message" id="message" class="ta" placeholder="Enter message here..."></textarea>

        <div class="row row-3">
            <button class="btn btn-send-msg" type="submit" value="Send" name="send_msg">Send</button>
            <!-- <a href="delete_program.php?pid=<?=$pid;?>&con=delete" class="btn-delete-program">Delete</a> -->
        </div>
        
        <?php
            if(isset($_POST['send_msg'])){
                $send_msg = $_POST['message'];
                $m_type = $_POST['m-type'];
                
                $q_send_msg = $mysqli->query("INSERT INTO replys_tbl SET reply_message='$send_msg', message_id='$mid', uid='$m_uid', from_uid='$s_uid'");
                if(!$q_send_msg){
                    echo $mysqli->error;
                    exit();
                
                } else {
                    ?>
                        <script>
                            alert("Message Sent Sucesfully.");
                            window.location = "admin.php";
                        </script>
                    <?php
                }
            }
        ?>
    </form>
    </div>

<script>
    function cancelChanges(){
        var con = confirm("Are you sure you want to exit?");
            if(con){
                <?php
                    unset($_SESSION['mid']);  
                ?>
                window.location = "admin.php";
            }
    };
</script>
</body>
</html>