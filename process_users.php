<?php
    include("dbh.php");

    if(isset($_GET['delete_user'])){
        $user_id = $_GET['delete_user'];
        $mysqli->query("DELETE FROM users WHERE id = '$user_id' ") or die ($mysqli->error());

        $_SESSION['userError'] = "User has been deleted!";
        header("location: users.php");
    }
    

    //Validate users
    if(isset($_GET['validate_user'])){
        $user_id = $_GET['validate_user'];
        $mysqli->query("UPDATE users SET validated = '1' WHERE id = '$user_id' ") or die ($mysqli->error());

        $_SESSION['userError'] = "User has been validated successfully!";
        header("location: users.php");
    }

    if(isset($_GET['edit_user'])){
        $user_id = $_GET['edit_user'];
        $users = mysqli_query($mysqli, "SELECT *, u.id AS user_id, r.id AS role_id FROM users u JOIN role r ON r.id = u.role WHERE u.id = '$user_id' ");
        $user = $users->fetch_array();
    }

    //Process Add User
    if(isset($_POST['save_user'])){
        $role = $_POST['role'];
        $fname = ucfirst($_POST['fname']);
        $lname = ucfirst($_POST['lname']);
        $email = strtolower($_POST['email']);
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        $checkUser = $mysqli->query("SELECT * FROM users WHERE email='$email' ");
        if(mysqli_num_rows($checkUser)>0){

            $_SESSION['userError'] = "Email already taken. Please try another.";
            header("location: users.php?fname=".$fname."&lname=".$lname."&email=".$email."&phone_number=".$phone_number);
        }
        else{
            $mysqli->query(" INSERT INTO users (firstname, lastname, email, password, phone_number, role) VALUES('$fname','$lname','$email','$password','$phone_number', '$role') ") or die ($mysqli->error);

            $_SESSION['userError'] = "User Account Creation Successful!";
            header("location: users.php");
        }
    }

    //Update User
    if(isset($_POST['update_user'])){
        $user_id = $_POST['user_id'];
        $role = $_POST['role'];
        $fname = ucfirst($_POST['fname']);
        $lname = ucfirst($_POST['lname']);
        $email = strtolower($_POST['email']);
        $phone_number = $_POST['phone_number'];

        $mysqli->query("UPDATE users SET firstname = '$fname', lastname = '$lname', email = '$email', phone_number= '$phone_number', role='$role'
        WHERE id = '$user_id' ") or die ($mysqli->error());

        $_SESSION['userError'] = "Information has been updated!";
        header("location: users.php");
    }

?>