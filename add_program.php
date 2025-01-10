<?php 
    require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Program</title>
    <link rel="stylesheet" href="css/add_program.css">
</head>
<body>
    <header>
        <h2>Add Program</h2>
    </header>
    
    <form action="" method="post">
       

        <div class="row row-1">
            <label for="program_name" class="lbl-name">Name</label>
            <input type="text" name="program_name" id="program_name" class="program_name" placeholder="Enter program name..." required>
            
        </div>

           <textarea name="program_description" id="program_description" class="ta" placeholder="Enter description here..." required></textarea>

        <div class="row row-3">
            <button class="btn btn-add-program" type="submit" value="Add Program" name="add_program">Add Program</button>
            <button class="btn btn-clear" type="reset" value="Clear">Clear</button>
        </div>
        
        <?php
            if(isset($_POST['add_program'])){
                $program_name = $_POST['program_name'];
                $program_description = $_POST['program_description'];
                
                $q_add_event = $mysqli->query("INSERT INTO programs_tbl SET program_name='$program_name', program_description='$program_description'");
                if(!$q_add_event){
                    echo $mysqli->error;
                    exit();
                } elseif($mysqli->affected_rows == 0){
                    ?>
                        <script>
                            alert("Failed.");
                        </script>
                    <?php
                } else {
                    ?>
                        <script>
                            alert("Program Added Sucesfully");
                            
                        </script>
                    <?php
                }
            }
        ?>
    </form>
</body>
</html>