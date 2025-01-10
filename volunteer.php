<?php
    require("connection.php");
        $q_volunteer = "SELECT * FROM users_tbl INNER JOIN volunteers_tbl ON users_tbl.uid = volunteers_tbl.vid";
        $s_volunteer = $mysqli->query($q_volunteer);

            if(!$s_volunteer){
                echo $mysqli->error;
                exit();
            } elseif($s_volunteer->num_rows == 0){
                ?>
                    <p>No records found.</p>
                <?php
            } else {

                while($r_volunteer = $s_volunteer->fetch_assoc()){
                        $ufname = $r_volunteer['ufname'];
                        $ulname = $r_volunteer['ulname'];
                        $mi = $r_volunteer['mi'];
                        $role = $r_volunteer['vrole'];
                        $status = $r_volunteer['vstatus'];
                        $hours = $r_volunteer['vhours'];


                }


                        
                    
            }
?>