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
            $_SESSION['role'] = $newCheckUser["role"];

            header("location: index.php");
        }
    }

    // Register
    if(isset($_POST['register'])){
        $role = 'patient';
        $fname = ucfirst($_POST['fname']);
        $lname = ucfirst($_POST['lname']);
        $email = strtolower($_POST['email']);
        $password = $_POST['password'];

        $checkUser = $mysqli->query("SELECT * FROM user WHERE email='$email' ");
        if(mysqli_num_rows($checkUser)>0){

            $_SESSION['registerError'] = "Email already taken. Please try another.";
            header("location: register.php?fname=".$fname."&lname=".$lname."&email=".$email);
        }
        else{
            $mysqli->query(" INSERT INTO user (firstname, lastname, email, password, role) VALUES('$fname','$lname','$email','$password', '$role') ") or die ($mysqli->error);

            $_SESSION['loginError'] = "User Account Creation Successful!";
            header("location: login.php");
        }
        header("location: login.php ");
    }
?>