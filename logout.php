<?php session_start();
    $_SESSION['session_status'] = 0;
    unset($_SESSION['uid']);
    unset($_SESSION['session_status']);
    session_destroy();
        ?>
            <script>
                window.location = "login.php";
            </script>
        <?php
?>