<?php

    // Login
    if(isset($_POST['login'])){
        header("location: index.php ");
    }

    // Register
    if(isset($_POST['register'])){
        header("location: login.php ");
    }
?>