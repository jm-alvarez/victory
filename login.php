<?php session_start();
    require("connection.php");
?>

<?php
    if(isset($_SESSION['session_status']) and $_SESSION['session_status'] == 1){
        ?>
            <script>
                window.location = "index.php";
            </script>
        <?php
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Victory</title>
    <link rel="icon" href="img/victory-icon.png" type="icon/x-image">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="main-container" id="main">
        <div class="login">
            <form action="" method="post">
                <h2>Login</h2>
                
                <input class="tb" type="text" name="username" id="username" placeholder="username" required >
                <input class="tb" type="password" name="password" id="password" placeholder="password" required >
                <a href="#">forgot password</a>
                <input class="btn" type="submit" value="Login" name="login">

<!-- ----------------------- PHP LOGIN ----------------------- -->

                <?php
                    if(isset($_POST['login'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        if(!empty($username) and !empty($password)){
                            $q_login = $mysqli->query("SELECT * FROM users_tbl WHERE username = '$username' AND password = '$password'");

                            if(!$q_login){
                                echo $mysqli->error;
                                exit();
                            } elseif($q_login->num_rows == 0){
                                ?>
                                    <p class="danger" style="color: red; font-weight: bold;">
                                        *Invalid username or password.
                                    </p>
                                <?php
                            } else {
                                $r_login = $q_login -> fetch_assoc();

                                if($r_login['username'] == $username and $r_login['password'] == $password){
                                    
                                        $_SESSION['uid'] = $r_login['uid'];
                                        $_SESSION['session_status'] = 1;
                                    
                                    if($r_login['usertype'] == 'admin'){
                                        ?>
                                            <script>
                                                window.location = "admin.php";
                                            </script>
                                        <?php
                                    } elseif($r_login['usertype'] == 'user') {
                                        ?>
                                            <script>
                                                window.location = "index.php";
                                            </script>
                                        <?php
                                    }
                                }
                            }
                        }
                    }
                ?>

            </form>
        </div>

        <div class="register">
            <form action="" method="post">
                <h2>Register</h2>
                <div class="row-1">
                    <div>
                        <label for="r-fname">First Name</label><label for="r-lname">Last Name</label>
                    </div>
                    <div>
                        <input class="tb" type="text" name="r-fname" id="r-fname" required placeholder="Firstname">
                        <input class="tb" type="text" name="r-lname" id="r-lname" required placeholder="Lastname">
                    </div>
                </div>

                <div class="row-2">
                    <div>
                    <label for="r-email">Email</label>
                    <input class="tb" type="email" name="r-email" id="r-email" required placeholder="Email">
                    </div>
                    <div>
                    <label for="r-username">Enter Username</label><input class="tb" type="text" name="r-username" id="r-username" required placeholder="Enter a username">
                    </div>
                    <div>
                    <label for="r-password">Enter Password</label><input class="tb" type="password" name="r-password" id="r-password" required placeholder="Enter a password">
                    </div>
                    <div>
                    <label for="re-password">Re-enter Password</label><input class="tb" type="password" name="re-password" id="re-password" required placeholder="Re-enter password">
                    </div>

                    <input class="btn" type="submit" value="Create Account" name="register">

                </div>

                <!-- ----------- PHP REGISTER ----------- -->

                    <?php
                        if(isset($_POST['register'])){

                            $r_fname = $_POST['r-fname'];
                            $r_lname = $_POST['r-lname'];
                            $r_fname = $_POST['r-fname'];
                            $r_email = $_POST['r-email'];
                            $r_username = $_POST['r-username'];
                            $r_password = $_POST['r-password'];
                            $re_password = $_POST['re-password'];

                                if(!empty($r_fname) and !empty($r_lname) and !empty($r_email) and !empty($r_username) and !empty($r_password)){

                                    if($r_password != $re_password){
                                        ?>
                                            <script>
                                                var main = document.getElementById('main');
                                                main.classList.toggle('right-panel-active');                                                    
                                            </script>
                                            <p class="danger" style="color: red; font-weight: bold;">*Passwords doesn't match.</p>
                                        <?php
                                    } else {
                                        $v_email = $mysqli->query("SELECT email FROM users_tbl WHERE email = '$r_email'");

                                        if($v_email->num_rows > 0){
                                            ?>
                                                <!-- <script>
                                                    alert("Email already in use.");
                                                </script> -->
                                                <p class="danger" style="color: red; font-weight: bold;">*Email is already in use.</p>
                                            <?php
                                        
                                        } else {
                                            $v_username = $mysqli->query("SELECT username FROM users_tbl WHERE username = '$r_username'");

                                            if($v_username->num_rows > 0){
                                                ?>
                                                <!-- <script>
                                                    alert("Username already in use.");
                                                </script> -->
                                                    <p class="danger" style="color: red; font-weight: bold;">*Username already used.</p>
                                                    <script>
                                                        var main = document.getElementById('main');
                                                        main.classList.toggle('right-panel-active');                                                    
                                                    </script>
                                                <?php

                                            } else {
                                                $q_register = $mysqli->query("INSERT INTO users_tbl SET username='$r_username', password='$r_password', ufname='$r_fname', ulname='$r_lname', email='$r_email', profile_pic = 'default-user.jpg', usertype = 'user'");
                                                
                                                    if(!$q_register){
                                                        echo $mysqli->error;
                                                        exit();
                                                    } elseif($mysqli->affected_rows == 0){
                                                        ?>
                                                            <script>
                                                                alert("Register Failed.");
                                                            </script>
                                                        <?php
                                                    } else {
                                                        $q_vol = $mysqli->query("INSERT INTO volunteers_tbl SET vrole='Member', vstatus='Inactive', vhours='0', uid = (SELECT uid FROM users_tbl WHERE username = '$r_username')");
                                                        
                                                        if($q_vol){
                                                            $u_fetch = $mysqli->query("SELECT uid FROM users_tbl WHERE username = '$r_username'");
                                                            $f_fetch = $u_fetch->fetch_assoc();



                                                            $_SESSION['uid'] = $f_fetch['uid'];
                                                            $_SESSION['session_status'] = 1;

                                                            ?>
                                                                <script>
                                                                    alert("Account created succssfully.");
                                                                    window.location = "index.php";
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
                <!-- -------------------------------------- -->

            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-left">
                    <img src="img/victory-logo-white.png" alt="logo" class="logo">
                    <div>
                        <h2>Welcome</h2>
                        <p>
                        Be one of Us, who bring sunshine to the lives of others cannot keep it from themselves.
                        Victory volunteers are not paid - not because they are worthless, but because they are priceless.
                        </p>
                    </div>
                    <button type="button" class="btn" id="btn-login">Login</button>
                </div>

                <div class="overlay-right">
                <img src="img/victory-logo-white.png" alt="logo" class="logo">
                    <div>
                        <h2>Welcome Back</h2>
                        <p>
                        Be one of Us, who bring sunshine to the lives of others cannot keep it from themselves.
                        Victory volunteers are not paid - not because they are worthless, but because they are priceless.
                        </p>
                    </div>
                    <button type="button" class="btn" id="btn-register">Register</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        var loginButton = document.getElementById('btn-login');
        var registerButton = document.getElementById('btn-register');
        var main = document.getElementById('main');

            registerButton.addEventListener('click', ()=> {
                main.classList.add('right-panel-active');
            });
            loginButton.addEventListener('click', ()=> {
                main.classList.remove('right-panel-active');
            });
    </script>
</body>
</html>