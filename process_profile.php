<?php
    header("Access-Control-Allow-Headers: *");
    include("dbh.php");
    if (isset($_POST['update_profile'])) {
        $user_id = $_POST['user_id'];
        $fname = ucfirst($_POST['fname']);
        $lname = ucfirst($_POST['lname']);
        $email = strtolower($_POST['email']);
        $phone_number = $_POST['phone_number'];

        $mysqli->query("UPDATE users SET firstname = '$fname', lastname = '$lname', email = '$email', phone_number= '$phone_number'
            WHERE id = '$user_id' ") or die($mysqli->error);

        $_SESSION['profileError'] = "Profile has been updated!";
        header("location: profile.php?user=" . $user_id);
    }


    //Post Caption
    if (isset($_GET['postCaption'])) {
        $data = json_decode(file_get_contents('php://input'), true);
        $_caption = $data['caption'];
        $caption = $mysqli -> real_escape_string($_caption);
        $user_id = $_GET['postCaption'];
        $mysqli->query(" INSERT INTO user_posts (user_id, user_post) VALUES('$user_id','$caption') ") or die($mysqli->error);

        $jsonEncode = array('response' => 'Caption has been added.');
        echo json_encode($jsonEncode);
    }


    //Get Caption
    if (isset($_GET['getCaption'])) {
        $user_id = $_GET['getCaption'];
        $user_posts = mysqli_query($mysqli, "SELECT * FROM user_posts WHERE user_id = '$user_id' ORDER BY date_added DESC");
        $posts = array();
        while ($post = mysqli_fetch_assoc($user_posts)) {
            $posts[] = $post;
        }
        echo json_encode($posts);
    }

    //Delete Post
    if(isset($_GET['deletePost'])){
        $data = json_decode(file_get_contents('php://input'), true);
        $postId = $data['postId'];
        $mysqli->query("DELETE FROM user_posts WHERE id = '$postId' ") or die($mysqli->error);

        $jsonEncode = array('response' => 'Post has been deleted!');
        echo json_encode($jsonEncode);
    }

?>