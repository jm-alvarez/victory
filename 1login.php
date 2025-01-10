<?php session_start();
    require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Victory</title>
    <link rel="stylesheet" href="css/1login.css">
    <link rel="icon" href="img/victory-icon.png" type="image/x-icon">
</head>
<body class="">
<input type="checkbox" name="toggler" id="toggler" class="toggler">
<div class="container">
    <div class="col col-1 login-container">
    <div class="text-container">
            <h2>Welcome</h2>
            <p>Be one if Us, who bring sunshine to the lives of others cannot keep it from themselves.
                Victory volunteers are not paid - not because they are worthless, but because they are priceless.
            </p>            
        </div>
        <form action="" method="post">
            <div class="header">
                <!-- <img src="img/victory-logo.png" alt="logo" class="logo"> -->
                <h2>Login</h2>
            </div>
            <div class="form-body">
                <label for="username">Username</label><input type="text" name="username" id="username" class="tb" >
                <label for="password">Password</label><input type="password" name="password" id="password" class="tb" >
                <a href="">forgot password?</a>
            </div>
            <div class="btn-container">
                <input type="submit" value="Login" name="login" class="btn" id="login"> <label for="toggler" class="btn btn-register">Register</label>
            </div>

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
                                <p>
                                    Invalid username or password.
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

        <div class="overlay overlay-1"></div>
    </div>

    <div class="col col-2 signup-container">
        <div class="text-container">
            <h2>Welcome Back</h2>
            <p>Be one if Us, who bring sunshine to the lives of others cannot keep it from themselves.
                Victory volunteers are not paid - not because they are worthless, but because they are priceless.
            </p>            
        </div>

        <form action="" method="post" id="register-form">
        <div class="header">
                <!-- <img src="img/victory-logo.png" alt="logo" class="logo"> -->
                <h2>Login</h2>
            </div>
            <div class="form-body">
                <label for="username">Username</label><input type="text" name="username" id="username" class="tb" >
                <label for="password">Password</label><input type="password" name="password" id="password" class="tb" >
                <a href="">forgot password?</a>
            </div>
            <div class="btn-container">
                <input type="submit" value="Login" name="login" class="btn" id="login"> <button class="btn" id="register">Signup</button>
            </div>


        </form>

        <div class="overlay overlay-2"></div>

    </div>
    
</div>
    <script>
        var body = document.getElementsByTagName('body')[0];
        var toggler = document.getElementById('toggler');

                toggler.addEventListener("click", function(){
                    toggler.classList.toggle('btn-register');
                    body.classList.toggle('register');
                });
    </script>
</body>
</html>