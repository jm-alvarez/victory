<?php session_start();
    require("connection.php");
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $q_vol = $mysqli->query("SELECT * FROM volunteers_tbl INNER JOIN users_tbl ON volunteers_tbl.uid = users_tbl.uid WHERE users_tbl.uid = '$id'");
        $q_fetch = $q_vol->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/edit_volunteer.css">
</head>
<body>
    <header>
        <h2>Edit Profile</h2>
    </header>

    <form action="" method="post">
        <div class="form-row-1">
            <div class="col col-1">
                <div class="row row-1">
                    <div class="tb-container fname-container">
                        <label for="fname" class="lbl lbl-fname">First Name</label><input type="text" name="fname" id="fname" class="tb" required value="<?=$q_fetch['ufname'];?>">
                    </div>
                    <div class="tb-container lname-container">
                        <label for="fname" class="lbl lbl-lname">Last Name</label><input type="text" name="lname" id="lname" class="tb" required value="<?=$q_fetch['ulname'];?>">
                    </div>
                    <div class="tb-container mi-container">
                        <label for="mi" class="lbl lbl-mi">MI</label><input type="text" maxlength="1" size="1" name="mi" id="mi" class="tb" value="<?=$q_fetch['mi'];?>">
                    </div>
                </div>

                <div class="row row-2">
                    <div class="tb-container email-container">
                        <label for="email" class="lbl lbl-email">Email</label><input type="text" name="email" id="email" class="tb" required value="<?=$q_fetch['email'];?>">
                    </div>
                    <div class="tb-container address-container">
                        <label for="address" class="lbl lbl-address">Address</label><input type="address" name="address" id="address" class="tb" required value="<?=$q_fetch['address'];?>">
                    </div>
                </div>
            </div>
            <div class="col col-2">
                    <label for="profile-pic" class="add-profile"><div class="img"><img src="profile_pics/<?=$q_fetch['profile_pic'];?>" alt="" class="add-pic" value=""><p>Add profile picture<p></div></label><input type="file" name="profile-pic" id="profile-pic" class="profile-pic" value="<?=$q_fetch['profile_pic'];?>">
            </div>
        </div>

        <div class="form-row-2">
            <div class="row row-1">
                <div class="tb-container username-container">
                    <label for="username" class="lbl lbl-username">Username</label><input type="text" name="username" id="username" class="tb" required value="<?=$q_fetch['username'];?>">
                </div>
                <div class="tb-container password-container">
                    <label for="password" class="lbl lbl-password">Password</label><input type="text" name="password" id="password" class="tb" required value="<?=$q_fetch['password'];?>">
                </div>
                
            </div>
        </div>

        <div class="form-row-3">

        </div>
        <div class="form-row-4">
            <div class="tb-container bio-container">
                <label for="bio" class="lbl lbl-bio">Bio</label><textarea name="bio" id="bio" class="tb tb-bio"><?=$q_fetch['bio'];?></textarea>
            </div>

            <div class="btn-container">
                <!-- <input type="reset" value="Cancel" onclick="cancelChanges()" class="btn btn-clear"> -->
                <input type="submit" value="Update" name="add-volunteer" class="btn btn-add-volunteer">
            </div>
        </div>
        <?php
            if(isset($_POST['add-volunteer'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $mi = $_POST['mi'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $profile_pic = $_POST['profile-pic'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $bio = $_POST['bio'];

                if(!empty($fname) and !empty($lname) and !empty($email) and !empty($username) and !empty($password)){

                    if(!empty($profile_pic)){
                                $q_add = $mysqli->query("UPDATE users_tbl SET username='$username', password='$password', ufname='$fname', ulname='$lname', mi='$mi.', email='$email', address='$address', bio='$bio', profile_pic='$profile_pic' WHERE uid='$id'");
                                    if(!$q_add){
                                        echo $mysqli->error;
                                        exit();
                                    } else {  
                                            ?>
                                                <script>
                                                    alert("Account updated successfully.");
                                                    
                                                </script>
                                            <?php
                                    }
                    } else if(empty($profile_pic)){
                        $q_add = $mysqli->query("UPDATE users_tbl SET username='$username', password='$password', ufname='$fname', ulname='$lname', mi='$mi.', email='$email', address='$address', bio='$bio' WHERE uid='$id'");
                        if(!$q_add){
                            echo $mysqli->error;
                            exit();
                        } else {  
                                ?>
                                    <script>
                                        alert("Account updated successfully.");
                                        
                                    </script>
                                <?php
                        }
                    }        
                            
                    
                }

                
            }
        ?>
    </form>


    <script>
        function cancelChanges(){
            var con = confirm("Are you sure you want to cancel this update?");

                if(con){
                    window.location = "index.php";
                }
        };
    </script>
</body>
</html>