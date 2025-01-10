<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_victory";

        $mysqli = new mysqli($servername, $username, $password, $dbname);

        if($mysqli->connect_error){
            die("Connection Failed" . $mysqli->connect_error);
        }
?>