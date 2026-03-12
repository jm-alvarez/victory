<?php
    require("connection.php");

    $q_program = $mysqli->query("SELECT * FROM programs_tbl ORDER BY date_added DESC");
    
    while($f_program = $q_program->fetch_assoc()){
        $pid = $f_program['program_id'];
        $program_name = $f_program['program_name'];
        $program_description = $f_program['program_description'];

        ?>
        <div class="program-list">
                            <div class="list-col-1">
                                <div class="list-row-1">
                                    <p><?= $program_name;?></p>
                                    <details><summary>Read description...</summary><p><?=$program_description;?></p></details>
                                </div>
                            </div>

                            <div class="list-col-2">
                                <a href="edit_program.php?pid=<?=$pid;?>" class="more vertical">
                                    <div class="dot dot-1"></div>
                                    <div class="dot dot-2"></div>
                                    <div class="dot dot-3"></div>
                                </a>
                            </div>
                        </div>
        <?php
    }
?>