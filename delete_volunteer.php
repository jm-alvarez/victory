<?php session_start();
    require("connection.php");
?>

<?php
    $id = $_GET['id'];
    if(isset($_GET['con']) and $_GET['con'] == 'delete'){
        ?>
            <script>

                var con = confirm("Are you sure you want to delete this record?");

                if(con){
                    window.location = "delete_volunteer.php?id=<?=$id;?>&com=delete";

                } else {
                    window.location = "admin.php";
                }
            </script>
        <?php
    }

    if(isset($_GET['com']) and $_GET['com'] == 'delete'){
        $q_delete = $mysqli->query("DELETE FROM volunteers_tbl WHERE uid='$id'") and $mysqli->query("DELETE FROM users_tbl WHERE uid='$id'");

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