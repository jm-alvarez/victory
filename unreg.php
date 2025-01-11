<?php
    require("connection.php");
    $pid = $_GET['pid'];
    if(isset($_GET['con']) and $_GET['con'] == 'delete'){
        ?>
            <script>

                var con = confirm("Are you sure you want to unregister this person?");

                if(con){
                    window.location = "unreg.php?pid=<?=$pid;?>&com=delete";
                }
            </script>
        <?php
    }

    if(isset($_GET['com']) and $_GET['com'] == 'delete'){
        $q_delete = $mysqli->query("DELETE FROM participants_tbl WHERE participant_id=$pid");

        if(!$q_delete){
            echo $mysqli->error;
            exit();
        } elseif($mysqli->affected_rows == 0){
            ?>
                <script>
                    alert("Unreg Failed.");
                </script>
            <?php
        } else {
            ?>
                <script>
                    alert("Unregistered successfully.");
                </script>
            <?php
        }
    }
?>