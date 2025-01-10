     <!-- ----------- Count Active Volunteers ---------- -->
     <?php
        require("connection.php");
        $v_active_cnt = 0;
         $q_active = $mysqli->query("SELECT vstatus FROM volunteers_tbl WHERE vstatus = 'Active'");
         while($q_active->fetch_assoc()) {
            $v_active_cnt++;
         }

    ?>