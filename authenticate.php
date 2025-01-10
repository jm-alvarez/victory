<?php
    if(isset($_SESSION['session_status']) and isset($_SESSION['uid'])){
        $uid = $_SESSION['uid'];
        $q_user = $mysqli->query("SELECT * FROM users_tbl WHERE uid = '$uid'");
        $r_user = $q_user->fetch_assoc();
        $ufname = $r_user['ufname'];
        $ulname = $r_user['ulname'];
        $mi = $r_user['mi'];
        $email = $r_user['email'];
        $bio = $r_user['bio'];
        $profile_pic = $r_user['profile_pic'];
    } else {
        ?>
            <script>
                window.location = "login.php";
            </script>
        <?php
    }
?>