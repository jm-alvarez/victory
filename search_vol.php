<?php
if(isset($_POST['search_vol'])){
                                    $search_val = $_POST['search_val'];

                                    $vol_search = $mysqli->query("SELECT * FROM users_tbl JOIN volunteers_tbl ON users_tbl.uid=volunteers_tbl.uid WHERE users_tbl.username='$search_val' OR users_tbl.ulname='$search_val' OR users_tbl.ufname='$search_val' OR users_tbl.email='$search_val'");

                                    if(!$vol_search){
                                        echo $mysqli->error;
                                    } elseif($vol_search->num_rows == 0) {
                                        ?>
                                            <p>No Records found.</p>
                                        <?php
                                    } else {
                                        $cnt = 0;
                                        while($vol_fetch = $vol_search->fetch_assoc()){
                                            $vid = $vol_fetch['uid'];
                                            $ufname = $vol_fetch['ufname'];
                                            $ulname = $vol_fetch['ulname'];
                                            $mi = $vol_fetch['mi'];
                                            $role = $vol_fetch['vrole'];
                                            $status = $vol_fetch['vstatus'];
                                            $hours = $vol_fetch['vhours'];

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
                                }
                                ?>