<?php
    // require("connection.php");

    $q_fetch = $mysqli->query("SELECT * FROM users_tbl");
        if(!$q_fetch){
            echo $mysqli->error;
            exit();
        } elseif($q_fetch->num_rows == 0){
            ?>
                <script>
                    console.log("No records found.");
                </script>
            <?php
        } else {
            $v_count = 0;
            while($r_fetch = $q_fetch->fetch_assoc()){
                $v_count++;
                
                $fetched_username = $r_fetch['username'];
                $fetched_email = $r_fetch['email'];
                $fetched_ufname = $r_fetch['ufname'];
                $fetched_ulname = $r_fetch['ulname'];
            }


        }
?>