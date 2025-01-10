<?php
    if(isset($_GET['uid'])){
        $uid = $_GET['uid'];
         $v_insert = $mysqli->query("INSERT INTO volunteers_tbl SET vrole = 'Member', vstatus = 'Inactive', vhours = '0', uid = '$uid'");

            if(!$v_insert){
                echo $mysqli->error;
                exit();

            } elseif($mysqli->affected_rows == 0){
                ?>
                    <p>Failed.</p>
                <?php
            } else {
                ?>
                    <script>
                        var main = document.getElementById('main');
                        main.classList.add('right-panel-active');                                                    
                    </script>
                <?php
            }
    }
    
?>