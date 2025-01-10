<?php
    require("connection.php");

    $q_program = $mysqli->query("SELECT * FROM programs_tbl");
    $cnt = 0;

    while($f_program = $q_program->fetch_assoc()){
        $cnt++;
        ?>
            <div class="box box-<?=$cnt++;?>">
                <h3><?=$f_program['program_name'];?></h3>

                <p><?=$f_program['program_description'];?></p>

                <a href="#">Learn more.</a>
            </div>
        <?php
    }
?>