<?php
date_default_timezone_set("UTC");
    $yearNow = date("Y");
    $monthNow = date("F");
    $dayNow = date("d D");
    $hourNow = date("g")+8-12;
    $minuteNow = date(":i a");
    $timeNow = $hourNow.$minuteNow;

    // echo $yearNow;
    // echo $monthNow;
    // echo $dayNow;
    // echo $hourNow . $minuteNow;
?>