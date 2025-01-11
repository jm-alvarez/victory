<?php
    require("connection.php");

    if(isset($_GET['program_page_no']) && isset($_GET['program_page_no']) !== ""){
        $page_no = $_GET['program_page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 5;
    $offset =($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $result_count = $mysqli->query("SELECT COUNT(*) AS total_records FROM db_victory.programs_tbl");
    $records = $result_count->fetch_assoc();
    $total_records = $records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);


    $q_program = $mysqli->query("SELECT * FROM programs_tbl ORDER BY date_added DESC LIMIT $offset, $total_records_per_page");
    
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
<div class="paging">
    <ul class="pagination">
        <li class="page-item"><a class="page-link <?=($page_no <= 1) ? 'disabled' : '';?>" <?=($page_no > 1) ? 'href=?program_page_no='.$previous_page : '';?>>Previous</a></li>
        <li class="page-item"><a class="page-link">1</a></li>
        <li class="page-item"><a class="page-link">2</a></li>
        <li class="page-item"><a class="page-link">3</a></li>
        <li class="page-item"><a class="page-link  <?=($page_no >= $total_no_of_pages) ? 'disabled' : '';?>" <?=($page_no < $total_no_of_pages) ? 'href=?program_page_no='.$next_page : '';?>>Next</a></li>
    </ul>
    <div class="total-page">
        <strong>
            Page <?=$page_no;?> of <?=$total_records_per_page;?>
        </strong>
    </div>
</div>