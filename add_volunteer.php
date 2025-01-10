<?php session_start();
    require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Volunteer</title>
    <link rel="stylesheet" href="css/add_volunteer.css">
</head>
<body>
    <header>
        <h2>Add Volunteer</h2>
    </header>

    <form action="" method="post">
        <div class="form-row-1">
            <div class="col col-1">
                <div class="row row-1">
                    <div class="tb-container fname-container">
                        <label for="fname" class="lbl lbl-fname">First Name</label><input type="text" name="fname" id="fname" class="tb" required>
                    </div>
                    <div class="tb-container lname-container">
                        <label for="fname" class="lbl lbl-lname">Last Name</label><input type="text" name="lname" id="lname" class="tb" required>
                    </div>
                    <div class="tb-container mi-container">
                        <label for="mi" class="lbl lbl-mi">MI</label><input type="text" maxlength="1" size="1" name="mi" id="mi" class="tb" required>
                    </div>
                </div>

                <div class="row row-2">
                    <div class="tb-container email-container">
                        <label for="email" class="lbl lbl-email">Email</label><input type="text" name="email" id="email" class="tb" required>
                    </div>
                    <div class="tb-container address-container">
                        <label for="address" class="lbl lbl-address">Address</label><input type="address" name="address" id="address" class="tb" required>
                    </div>
                </div>
            </div>
            <div class="col col-2">
                    <label for="profile-pic" class="add-profile"><div class="img"><img src="icons/add-user.png" alt="" class="add-pic"><p>Add profile picture<p></div></label><input type="file" name="profile-pic" id="profile-pic" class="profile-pic" value="profile_pics/default-user.jpg">
            </div>
        </div>

        <div class="form-row-2">
            <div class="row row-1">
                <div class="tb-container username-container">
                    <label for="username" class="lbl lbl-username">Username</label><input type="text" name="username" id="username" class="tb" required>
                </div>
                <div class="tb-container password-container">
                    <label for="password" class="lbl lbl-password">Password</label><input type="password" name="password" id="passwpord" class="tb" required>
                </div>
                <div class="tb-container re-enter-container">
                    <label for="re-enter-password" class="lbl lbl-re-enter-password">Re-Enter Password</label><input type="password" name="re-enter-password" id="re-enter-password" class="tb">
                </div>
            </div>
        </div>

        <div class="form-row-3">
            <div class="row row-1">
                <div class="tb-container usertype-container">
                    <label for="usertype" class="lbl lbl-usertype">User Type</label><div><input type="radio" name="usertype" id="user" value="user" checked><label for="user" class="lbl-user">User</label></div><div><input type="radio" name="usertype" value="admin" id="admin"><label for="admin" class="lbl-admin">Admin</label></div>
                </div>

                <div class="tb-container role-container">
                    <label for="role" class="lbl lbl-role">Role</label>
                        <select name="role" id="role">
                            <option value="Admin">Administrator</option>
                            <option value="Community Leader">Community Leader</option>
                            <option value="Member" selected>Member</option>
                        </select>
                </div>
                <div class="tb-container status-container">
                    <label for="status" class="lbl lbl-status">Status</label><div><input type="radio" name="status" id="active" value="Active"><label for="active" class="lbl-active">Active</label></div><div><input type="radio" name="status" value="Inactive" id="inactive" checked><label for="inactive" class="lbl-inactive">Inactive</label></div>
                </div>
                <div class="tb-container hours-container">
                    <label for="vhours" class="lbl lbl-hours">Hours Participated</label><input type="number" name="vhours" id="vhours" class="tb" value="0">
                </div>

            </div>
        </div>
        <div class="form-row-4">
            <div class="tb-container bio-container">
                <label for="bio" class="lbl lbl-bio">Bio</label><textarea name="bio" id="bio" class="tb tb-bio">No bio to show.</textarea>
            </div>

            <div class="btn-container">
                <input type="reset" value="Clear" class="btn btn-clear">
                <input type="submit" value="Add" name="add-volunteer" class="btn btn-add-volunteer">
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
                $re_password = $_POST['re-enter-password'];
                $usertype = $_POST['usertype'];
                $role = $_POST['role'];
                $status = $_POST['status'];
                $vhours = $_POST['vhours'];
                $bio = $_POST['bio'];

                if(!empty($fname) and !empty($lname) and !empty($email) and !empty($username) and !empty($password)){
                    if($password != $re_password){
                        ?>  
                            <script>
                                alert("*Passwords doesn't match.");
                            </script>
                            <p style="color: red; font-weight: bold;">*Passwords doesn't match.</p>
                        <?php
                    } else {
                        $v_email = $mysqli->query("SELECT email FROM users_tbl WHERE email = '$email'");

                        if($v_email->num_rows > 0){
                            ?>
                                <script>
                                    alert("Email already in use.");
                                </script>
                                <p style="color: red; font-weight: bold;">*Email is already in use.</p>
                            <?php
                        
                        } else {
                            $v_username = $mysqli->query("SELECT username FROM users_tbl WHERE username = '$username'");

                            if($v_username->num_rows > 0){
                                ?>
                                    <script>
                                        alert("*Username already in use.");
                                    </script>
                                    <p class="danger" style="color: red; font-weight: bold;">*Username already used.</p>
                                <?php
                            } else {
                                $q_add = $mysqli->query("INSERT INTO users_tbl SET username='$username', password='$password', ufname='$fname', ulname='$lname', mi='$mi.', email='$email', address='$address', bio='$bio', profile_pic='profile_pics/$profile_pic', usertype='$usertype'");
                                    if(!$q_add){
                                        echo $mysqli->error;
                                        exit();
                                    } elseif($mysqli->affected_rows == 0){
                                        ?>
                                            <script>
                                                alert("Register Failed.");
                                                exit();
                                            </script>
                                        <?php
                                    } else {
                                        $q_add_vol = $mysqli->query("INSERT INTO volunteers_tbl SET vrole='$role', vstatus='$status', vhours='$vhours', uid = (SELECT uid FROM users_tbl WHERE username = '$username')");
                                        
                                        if($q_add_vol){
                                            ?>
                                                <script>
                                                    alert("Account created succssfully.");
                                                </script>
                                            <?php
                                        } else {
                                            echo $mysqli->error;
                                        }
                                            
                                        ?>
                                        <?php
                                    }
                            }
                        }
                    }
                }

                
            }
        ?>
    </form>
</body>
</html>