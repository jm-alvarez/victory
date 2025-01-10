<?php session_start();
    require("connection.php");
?>

<?php
    $eid = $_GET['eid'];
    if(isset($_GET['con']) and $_GET['con'] == 'delete'){
        ?>
            <script>

                var con = confirm("Are you sure you want to delete this event?");

                if(con){
                    window.location = "delete_event.php?eid=<?=$eid;?>&com=delete";

                }
            </script>
        <?php
    }

    if(isset($_GET['com']) and $_GET['com'] == 'delete'){
        $q_delete = $mysqli->query("DELETE FROM events_tbl WHERE event_id='$eid'");

        if(!$q_delete){
            echo $mysqli->error;
            exit();
        } elseif($mysqli->affected_rows == 0){
            ?>
                <script>
                    alert("Delete Failed.");
                </script>
            <?php
        } else {
            ?>
                <script>
                    alert("Deleted successfully.");
                    window.location = "admin.php";
                </script>
            <?php
        }
    }
?>