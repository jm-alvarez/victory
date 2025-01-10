<?php session_start();
    require("connection.php");
?>
<?php
    if(isset($_GET['pid'])){
        $pid=$_GET['pid'];
        
        $q_program = $mysqli->query("SELECT * FROM programs_tbl WHERE program_id = $pid");
        $program_fetch = $q_program->fetch_assoc();
        
        $p_name = $program_fetch['program_name'];
        $p_description = $program_fetch['program_description'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program</title>
    <link rel="stylesheet" href="css/edit_program.css">
</head>
<body>
<div class="edit-program-container">
    <header>
        <button class="btn-close" onclick="cancelChanges()">X</button>
        <h2>Edit Program</h2>
    </header>
    
    <form action="" method="post">
       

        <div class="row row-1">
            <label for="program_name" class="lbl-name">Name</label>
            <input type="text" name="program_name" id="program_name" class="program_name" placeholder="Enter program name..." value="<?=$p_name?>">
            
        </div>

           <textarea name="program_description" id="program_description" class="ta" placeholder="Enter description here..."><?=$p_description?></textarea>

        <div class="row row-3">
            <button class="btn btn-update-program" type="submit" value="Update Program" name="update_program">Update Program</button>
            <a href="delete_program.php?pid=<?=$pid;?>&con=delete" class="btn-delete-program">Delete</a>
        </div>
        
        <?php
            if(isset($_POST['update_program'])){
                $program_name = $_POST['program_name'];
                $program_description = $_POST['program_description'];
                
                $q_edit_program = $mysqli->query("UPDATE programs_tbl SET program_name='$program_name', program_description='$program_description' WHERE program_id='$pid'");
                if(!$q_edit_program){
                    echo $mysqli->error;
                    exit();
                
                } else {
                    ?>
                        <script>
                            alert("Program Updated Sucesfully");
                            window.location = "admin.php";
                        </script>
                    <?php
                }
            }
        ?>
    </form>
</div>
<script>
    function cancelChanges(){
        var con = confirm("Are you sure you want to cancel this update?");
            if(con){
                <?php
                    unset($_SESSION['pid']);  
                ?>
                window.location = "admin.php";
            }
    };
</script>
</body>
</html>