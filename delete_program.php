<?php session_start();
    require("connection.php");
?>

<?php
    $pid = $_GET['pid'];
    if(isset($_GET['con']) and $_GET['con'] == 'delete'){
        ?>
            <script>

                var con = confirm("Are you sure you want to delete this program?");

                if(con){
                    window.location = "delete_program.php?pid=<?=$pid;?>&com=delete";

                }
            </script>
        <?php
    }

    if(isset($_GET['com']) and $_GET['com'] == 'delete'){
        $q_delete = $mysqli->query("DELETE FROM programs_tbl WHERE program_id='$pid'");

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