<?php
    header("Access-Control-Allow-Headers: *");
    $currentDateTime = date_default_timezone_set('Asia/Manila');
    $currentDateTime = date('Y-m-d H:i:s');
    include("../dbh.php");

    if (isset($_GET['postCaption'])) {
        $data = json_decode(file_get_contents('php://input'), true);
        $_caption = $data['caption'];
        $caption = $mysqli -> real_escape_string($_caption);
        $user_id = $_GET['postCaption'];
        $mysqli->query(" INSERT INTO user_posts (user_id, user_post) VALUES('$user_id','$caption') ") or die($mysqli->error);
    
        $jsonEncode = array('response' => 'Caption has been added.');
        echo json_encode($jsonEncode);
    }
    

    //Check to get friends
    if(isset($_GET['getFriends'])){
        $user_id = $mysqli -> real_escape_string($_GET['getFriends']);
        $getUsersSuggestion = mysqli_query($mysqli, "SELECT * FROM users
        WHERE (id NOT IN (SELECT from_user_id FROM user_links WHERE from_user_id = '$user_id')
        AND id NOT IN (SELECT to_user_id FROM user_links WHERE from_user_id = '$user_id'))
        AND
        (id NOT IN (SELECT from_user_id FROM user_links WHERE to_user_id = '$user_id')
        AND id NOT IN (SELECT to_user_id FROM user_links WHERE to_user_id = '$user_id'))
        AND id <> '$user_id'
        LIMIT 10");
        $userSuggesstions = array();
        while ($user = mysqli_fetch_assoc($getUsersSuggestion)) {
            $userSuggesstions[] = $user;
        }
        echo json_encode($userSuggesstions);
    }

    //Send Request
    if(isset($_GET['sendRequest'])){
        $data = json_decode(file_get_contents('php://input'), true);
        $from_user_id = $mysqli -> real_escape_string($data['from_user_id']);
        $to_user_id = $mysqli -> real_escape_string($data['to_user_id']);
        $mysqli->query(" INSERT INTO user_links (from_user_id, to_user_id) VALUES('$from_user_id','$to_user_id') ") or die($mysqli->error);

        $response = array('response' => 'Request has been sent!');
        echo json_encode($response);
    }

    //Get Link Request
    if(isset($_GET['getLinkRequest'])){
        $user_id = $mysqli -> real_escape_string($_GET['getLinkRequest']);
        $userLinkRequest = array();
        $getLinkRequest = mysqli_query($mysqli, " SELECT *
        FROM users WHERE id IN (SELECT from_user_id FROM user_links WHERE to_user_id = '$user_id' AND linked = 'false') ");
        while ($request = mysqli_fetch_assoc($getLinkRequest)) {
            $userLinkRequest[] = $request;
        }
        echo json_encode($userLinkRequest);
    }

    //Confirm Request
    if(isset($_GET['confirmRequest'])){
        $data = json_decode(file_get_contents('php://input'), true);
        $from_user_id = $data['from_user_id'];
        $to_user_id = $data['to_user_id'];
        $mysqli->query("UPDATE user_links SET linked = 'true'
        WHERE from_user_id = '$from_user_id' AND to_user_id = '$to_user_id' ") or die($mysqli->error);

        $jsonEncode = array('response' => 'User has been accepted.');
        echo json_encode($jsonEncode);
    }

    //Delete Request
    if(isset($_GET['cancelRequest'])){
        $data = json_decode(file_get_contents('php://input'), true);
        $from_user_id = $data['from_user_id'];
        $to_user_id = $data['to_user_id'];
        $mysqli->query("DELETE FROM user_links WHERE from_user_id = '$from_user_id' AND to_user_id = '$to_user_id' ") or die($mysqli->error);

        $jsonEncode = array('response' => 'User requeset has been rejected.');
        echo json_encode($jsonEncode);
    }

    //Get Caption own user
    if (isset($_GET['getCaption'])) {
        $user_id = $_GET['getCaption'];
        $user_posts = mysqli_query($mysqli, "SELECT * FROM user_posts up
        JOIN users u
        ON u.id = up.user_id
        WHERE user_id = '$user_id' ORDER BY date_added DESC LIMIT 1");
        $posts = array();
        while ($post = mysqli_fetch_assoc($user_posts)) {
            $posts[] = $post;
        }

        $getFriendsPost = mysqli_query($mysqli, "SELECT * 
        FROM user_posts up
        JOIN users u
        ON u.id = up.user_id
        WHERE (up.user_id IN
               (SELECT from_user_id FROM user_links WHERE to_user_id = '$user_id' AND linked = 'true')
        OR up.user_id IN
               (SELECT to_user_id FROM user_links WHERE from_user_id = '$user_id' AND linked = 'true'))
        AND up.user_id <> '$user_id'
        ORDER BY up.date_added DESC
        LIMIT 10");
        while ($post = mysqli_fetch_assoc($getFriendsPost)) {
            $posts[] = $post;
        }
        echo json_encode($posts);
    }


    //Upload pet's location
    if (isset($_GET['uploadPetLocation'])) {
        $user_id = $_GET['uploadPetLocation'];
        $data = json_decode(file_get_contents('php://input'), true);
        $pet_lat = $data['pet_lat'];
        $pet_long = $data['pet_long'];
        $created_at = $currentDateTime;
        $mysqli->query(" INSERT INTO pet_location (user_id, pet_lat, pet_long, created_at) VALUES('$user_id','$pet_lat','$pet_long', '$created_at') ") or die($mysqli->error);
        $jsonEncode = array('response' => 'Location has been added.');
        echo json_encode($jsonEncode);
    }    
?>