<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'sms');
if(!$con) {
    die('DB Not Connected'. mysqli_error($con));
    // echo 'connected';
}
?>