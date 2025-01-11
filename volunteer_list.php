<?php
    require("connection.php");

    if(isset($_GET['vol_page_no']) && isset($_GET['vol_page_no']) !== ""){
        $page_no = $_GET['vol_page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 10;
    $offset =($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $result_count = $mysqli->query("SELECT COUNT(*) AS total_records FROM db_victory.users_tbl");
    $records = $result_count->fetch_assoc();
    $total_records = $records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);


    $q_volunteer = $mysqli->query("SELECT * FROM users_tbl JOIN volunteers_tbl ON users_tbl.uid=volunteers_tbl.uid LIMIT $offset, $total_records_per_page");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer List</title>
    <!-- <link rel="stylesheet" href="css/volunteer_list.css"> -->
</head>
<body>
    
<div class="volunteer-container">
                    <div class="row row-1">
                        <h4>Volunteer List</h4>
                        

                        <form action="" method="post">
                        <button type="button" class="btn btn-add-volunteer" id="btn-add-volunteer"><div class="plus"><div class="line line-1"></div>
                        <div class="line line-2"></div></div>Add Volunteer</button>
                            <input type="search" name="search_val" id="search-val" placeholder="Search" class="search-val">
                            <button type="submit" name="search_vol" class="btn-search" id="btn-search" ><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg></button>
                        </form>
                    </div>
                    
                    <div class="row row-2">
                        <div class="container-header shadow">
                            <h5 class="name" >Name</h5>
                            <h5 class="role">Role</h5>
                            <h5 class="status">Status</h5>
                            <h5 class="hours">Hours</h5>
                            <h5 class="actions">Actions</h5>
                        </div>

                        <div class="v-list" id="v-list">
            <!-- --------------------- VOLUNTEER LIST FETCH --------------------- -->
                            <?php
                                if(empty($_POST['search_val'])){
                                    // $q_volunteer = "SELECT * FROM volunteers_tbl INNER JOIN users_tbl ON volunteers_tbl.uid = users_tbl.uid";
                                    $q_volunteer = $mysqli->query("SELECT * FROM users_tbl JOIN volunteers_tbl ON users_tbl.uid=volunteers_tbl.uid LIMIT $offset, $total_records_per_page");
                                            $cnt =0;
                                            while($r_volunteer = $q_volunteer->fetch_assoc()){
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

                                if(isset($_POST['search_vol'])){

                                    if(empty($_POST['search_val'])){
                                        // $q_volunteer = "SELECT * FROM volunteers_tbl INNER JOIN users_tbl ON volunteers_tbl.uid = users_tbl.uid";
                                        $s_volunteer = $mysqli->query($q_volunteer);
                                            if(!$s_volunteer){
                                                echo $mysqli->error;
                                                exit();
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
                                        }
    
                                   
                                    else {
                                $search_val = $_POST['search_val'];
                                    $vol_search = $mysqli->query("SELECT * FROM users_tbl JOIN volunteers_tbl ON users_tbl.uid=volunteers_tbl.uid WHERE users_tbl.username='$search_val' OR users_tbl.ulname='$search_val' OR users_tbl.ufname='$search_val' OR users_tbl.email='$search_val' LIMIT $offset, $total_records_per_page");
                        
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
                                    
                                }
                                
                            ?>
            <!-- --------------------------------------------------------------- -->
                        </div>
                    </div>
                        
                </div>
                <div class="paging">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link <?=($page_no <= 1) ? 'disabled' : '';?>" <?=($page_no > 1) ? 'href=?vol_page_no='.$previous_page : '';?>>Previous</a></li>
                        <li class="page-item"><a class="page-link">1</a></li>
                        <li class="page-item"><a class="page-link">2</a></li>
                        <li class="page-item"><a class="page-link">3</a></li>
                        <li class="page-item"><a class="page-link  <?=($page_no >= $total_no_of_pages) ? 'disabled' : '';?>" <?=($page_no < $total_no_of_pages) ? 'href=?vol_page_no='.$next_page : '';?>>Next</a></li>
                    </ul>
                    <div class="total-page">
                        <strong>
                            Page <?=$page_no;?> of <?=$total_records_per_page;?>
                        </strong>
                    </div>
                </div>
</body>
</html>
                                