<?php
    include("dbh.php");

    if(isset($_POST['save'])){
        $patient_id = $_POST['patient_id'];
        $therapist = $_POST['therapist'];
        $diagnosis = $_POST['diagnosis'];
        $treatment = $_POST['treatment'];

        $mysqli->query(" INSERT INTO patient_record (patient_id, therapist_id, diagnosis, treatment_recomendation) VALUES('$patient_id','$therapist','$diagnosis','$treatment') ") or die ($mysqli->error);

        $_SESSION['message'] = "Record has been saved!";
        $_SESSION['msg_type'] = "success";
        $getURI = $_SESSION['getURI'];
        header("location: ".$getURI);
    }

    if(isset($_POST['update'])){
        $user_id = $_POST['user_id'];
        $role = $_POST['role'];
        $fname = ucfirst($_POST['fname']);
        $lname = ucfirst($_POST['lname']);
        $email = strtolower($_POST['email']);

        $mysqli->query("UPDATE user SET firstname = '$fname', lastname = '$lname', email = '$email' WHERE id = '$user_id' ") or die ($mysqli->error);
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "info";
        header("location: users.php");
    }

    if(isset($_GET['validate'])){
        $user_id = $_GET['validate'];
        $mysqli->query("UPDATE users SET validated = '1' WHERE id = '$user_id' ") or die ($mysqli->error);

        $_SESSION['message'] = "User has been validated!";
        $_SESSION['msg_type'] = "success";
        header("location: users.php");

    }


    //Delete user
    if(isset($_GET['delete'])){
        $user_id = $_GET['delete'];
        $mysqli->query("DELETE FROM user WHERE id='$user_id'") or die($mysqli->error);

        $_SESSION['message'] = "Record has been deleted!";
        $_SESSION['msg_type'] = "danger";
        header("location: users.php");
    }

    $firstname = "";
    $lastname = "";
    $email = "";

    //Edit User
    if(isset($_GET['edit'])){
        $user_id = $_GET['edit'];
        $users = $mysqli->query("SELECT * FROM user WHERE id='$user_id'") or die ($mysqli->error);
        $edit_user = $users->fetch_array();
        $firstname = $edit_user["firstname"];
        $lastname = $edit_user["lastname"];
        $email = $edit_user["email"];
    }


?>