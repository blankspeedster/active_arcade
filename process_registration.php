<?php
    include("dbh.php");

    //Check if email logged in is valid or session is active
    if(isset($_SESSION['email'])){
        header('location: index.php');
    }
    //Process Login
    if(isset($_POST['login'])){
        $email = strtolower($_POST['email']);
        $password = $_POST['password'];

        $checkUser = $mysqli->query("SELECT * FROM users WHERE email='$email' ");

        if(mysqli_num_rows($checkUser) <= 0){
            $_SESSION['loginError'] = "Email not found. Please try again.";
            header("location: sign-in.php?email=".$email);
        }
        else{
            $newCheckUser = $checkUser->fetch_array();
            $hashPassword = $newCheckUser['password'];
            $verify = password_verify($password, $hashPassword);
            if ($verify){
                if($newCheckUser["validated"]==0){
                    $_SESSION['loginError'] = "Account is pending validation. Please wait for a while.";
                    header("location: sign-in.php?email=".$email);
                }
                else{
                    $_SESSION['user_id'] = $newCheckUser["id"];
                    $_SESSION['email'] = $newCheckUser["email"];
                    $_SESSION['firstname'] = $newCheckUser["firstname"];
                    $_SESSION['lastname'] = $newCheckUser["lastname"];
                    $_SESSION['role'] = $newCheckUser["role"];
                    header("location: index.php");
                }

            } else {
                $_SESSION['loginError'] = "Incorrect password!";
                header("location: sign-in.php?email=".$email);
            }
        }
    }

    //Process Registration
    if(isset($_POST['register_account'])){
        $role = $_POST['role'];
        $fname = ucfirst($_POST['fname']);
        $lname = ucfirst($_POST['lname']);
        $email = strtolower($_POST['email']);
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $checkUser = $mysqli->query("SELECT * FROM users WHERE email='$email' ");
        if(mysqli_num_rows($checkUser)>0){

            $_SESSION['registerError'] = "Email already taken. Please try another.";
            header("location: sign-up.php?fname=".$fname."&lname=".$lname."&email=".$email."&phone_number=".$phone_number);
        }
        else{
            $mysqli->query(" INSERT INTO users (firstname, lastname, email, password, role, phone_number) VALUES('$fname','$lname','$email','$password', '$role','$phone_number') ") or die ($mysqli->error);

            $_SESSION['loginError'] = "User Account Creation Successful!";
            header("location: sign-in.php");
        }
    }
?>