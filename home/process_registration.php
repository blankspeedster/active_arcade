<?php
    require("dbh.php");

    // Login
    if(isset($_POST['login'])){
        $email = strtolower($_POST['email']);
        $password = $_POST['password'];
        $checkUser = $mysqli->query("SELECT * FROM user WHERE email='$email' AND password = '$password' ");

        if(mysqli_num_rows($checkUser) <= 0){
            $_SESSION['loginError'] = "Email not found or incorrect password. Please try again.";
            header("location: login.php?email=".$email);
        }
        else{
            $newCheckUser = $checkUser->fetch_array();
            $_SESSION['user_id'] = $newCheckUser["id"];
            $_SESSION['email'] = $newCheckUser["email"];
            $_SESSION['firstname'] = $newCheckUser["firstname"];
            $_SESSION['lastname'] = $newCheckUser["lastname"];
            $_SESSION['date_of_birth'] = $newCheckUser["role"];

            header("location: index.php");
        }
    }

    // Register
    if(isset($_POST['register'])){
        header("location: login.php ");
    }
?>