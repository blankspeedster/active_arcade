<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    $host = '127.0.0.1';
    $port = "3306";
    $username = 'activate_arcade_database';
    $password = 'activate_arcade_database';
    $database = 'activate_arcade_database';

    $mysqli = new mysqli($host, $username, $password, $database, $port) or die(mysqli_error($mysqli));
    $status = mysqli_query($mysqli, "SELECT * FROM hand_status WHERE id = '1' ");
    $stat = $status->fetch_array();
    echo $stat["status"];
?>