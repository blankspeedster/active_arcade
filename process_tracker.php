<?php
    include("dbh.php");

    //Get pets tracker
    if(isset($_GET['getPetLocation'])){
        $user_id = $mysqli -> real_escape_string($_GET['getPetLocation']);
        $getPetLocations = mysqli_query($mysqli, "SELECT * FROM pet_location
        WHERE user_id = '$user_id'
        ORDER BY created_at DESC
        LIMIT 1");
        $petLocation = array();
        $petLocation = $getPetLocations->fetch_array();
        // while ($getPetLocation = mysqli_fetch_assoc($getPetLocations)) {
        //     $petLocation[] = $getPetLocation;
        // }
        echo json_encode($petLocation);
    }
?>

