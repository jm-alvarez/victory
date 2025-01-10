<?php

                                $q_volunteer = "SELECT * FROM volunteers_tbl INNER JOIN users_tbl ON volunteers_tbl.uid = users_tbl.uid";
                                $s_volunteer = $mysqli->query($q_volunteer);

                                    if(!$s_volunteer){
                                        echo $mysqli->error;
                                        exit();
                                    } elseif($s_volunteer->num_rows == 0){
                                        ?>
                                            <p>No records found.</p>
                                        <?php
                                    } else {
                                        $cnt = 0;
                                        while($r_volunteer = $s_volunteer->fetch_assoc()){
                                                $vid = $r_volunteer['uid'];
                                                $ufname = $r_volunteer['ufname'];
                                                $ulname = $r_volunteer['ulname'];
                                                $mi = $r_volunteer['mi'];
                                                $role = $r_volunteer['vrole'];
                                                $status = $r_volunteer['vstatus'];
                                                $hours = $r_volunteer['vhours'];

                                                $cnt++;

                                                ?>
                                                <div class="v-container">
                                                    <div class="container">
                                                        <p><?=$ufname;?> <?=$mi;?> <?=$ulname;?></p>
                                                        <p><?=$role;?></p>
                                        
                                                        <?php
                                                            if($status == 'Active'){
                                                                ?>
                                                                    <p style="color: green; font-weight: bold;"><?=$status;?></p>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                    <p style="color: red; font-weight: bold;"><?=$status;?></p>
                                                                <?php
                                                            }
                                                        ?>

                                                        <p><?=$hours;?></p>
                                                        
                                                        <div class="more-options">
                                                            <a href="delete_volunteer.php?id=<?=$vid;?>&con=delete" class="btn btn-delete">Delete</a>   
                                                            <a href="edit_volunteer.php?id=<?=$vid;?>" class="btn btn-edit">Edit</a>  
                                                        </div>
                                                        
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    
                                    }
                                    ?>
                            </div>