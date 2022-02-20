<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'activate_arcade_database';

    $mysqli = new mysqli($host,$username,$password,$database) or die(mysqli_error($mysqli));

?>