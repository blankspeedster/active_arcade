<?php
require_once("process_tracker.php");
include("head.php");
$_SESSION['sidebar'] = "Pet Tracking";
$current_user = $_SESSION['user_id'];

?>
<title>
    Active Arcade - Track Pet
</title>

<body class="g-sidenav-show  bg-gray-200">
    <style>
        #map {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>
    <?php include("aside.php"); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <!-- End Navbar -->

        <!-- Vue App Here -->
        <span id="vueApp" class="show">

            <div class="container-fluid py-4">
                <div class="row mb-4">

                    <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0 bg-gradient-success">
                                <div class="row">
                                    <div class="col-lg-6 col-7">
                                        <h6 class="text-white">Track your pet here</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <!-- <p class="m-4">Long: {{long}} <br>Lat: {{lat}}</p> -->
                                <p class="m-4"><b>Please refer to the map below to see your pet's and your location.</b></p>
                                <form @submit.prevent="getLocation">
                                    <!-- <div class="card p-2 m-2"> -->
                                    <div class="card-body px-0 pb-2 m-2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <h6>Put the allowed distance between you and your pet. (in meters)</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" type="number" step="any" style="border: 1px solid" v-model="allowedDistance"></input>
                                            </div>
                                            <div class="col-lg-6">
                                                <button class="btn btn-sm btn-success m-1" type="submit">Update Distance</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </form>
                                <p class="m-4"><b>The distance between you and your pet is {{petDistance}} KM.</b></p>

                                <div class="row" v-if="petOutOfRange">
                                    <div class="col-lg-12">
                                        <center>
                                        <button type="submit" name="register_account" id="register_account" class="btn btn-lg bg-gradient-danger btn-lg w-90 m-1 mr-1">Your pet is out of range!</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">

                    <div class="col-lg-12 col-md-12 mb-md-0 mb-4" style="height: 500px !important;">
                        <div class="card" style="height: 500px !important;">
                            <div class="card-header pb-0 bg-gradient-success">
                                <div class="row">
                                    <div class="col-lg-6 col-7">
                                        <h6 class="text-white">Current location</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <center>
                    <button class="btn btn-warning text-dark" @click="getLocation()">
                        Update pet location
                    </button>
                </center>

                <?php include("footer.php"); ?>
            </div>

        </span>
        <!-- <div id="map"></div> -->
    </main>
    <?php //include("fixed-plugin.php"); 
    ?>
    <?php include("core-js-files.php"); ?>

</body>
<script>
    new Vue({
        el: "#vueApp",
        data() {
            return {
                isEdit: false,
                caption: null,
                captionHere: null,
                showSnackBar: false,
                snackBarMessage: null,
                addingPost: false,
                btnMessage: "Post",

                //Posts
                userPosts: [],

                //Friends
                friendSuggestions: [],
                linkRequests: [],
                requestId: null,

                //Sample
                long: 0,
                lat: 0,

                //Distance
                petDistance: 0,
                allowedDistance: 100,
                petOutOfRange: false,
            }
        },
        methods: {
            getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(this.showPosition, this.showError);
                } else {
                    this.long = "Geolocation is not supported by this browser.";
                }
            },

            async showPosition(position) {
                this.lat = position.coords.latitude;
                this.long = position.coords.longitude;

                var userLat = this.lat;
                var userLong = this.long;

                //Show Markers
                var container = L.DomUtil.get('map');
                if (container != null) {
                    container._leaflet_id = null;
                }
                var map = L.map('map').setView([userLat, userLong], 13);
                var gl = L.mapboxGL({
                    attribution: "\u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
                    style: 'https://api.maptiler.com/maps/osm-standard/style.json?key=gcypTzmAMjrlMg46MJG3#5.9/16.04327/120.29239'
                }).addTo(map);

                var userIcon = L.icon({
                    iconUrl: 'assets/img/user.png',
                    iconSize: [50, 50],
                    iconAnchor: [25, 25]
                });

                // L.marker([petLat, petLong]).addTo(map).bindPopup();

                L.marker([userLat, userLong], {
                        icon: userIcon
                    }).addTo(map)
                    .bindPopup('Your Location', {
                        autoPan: false
                    })
                    .openPopup();

                //Get Pet Location
                let petLocation = [];
                const options = {
                    method: "POST",
                    url: "process_tracker.php?getPetLocation=" + <?php echo $current_user; ?>,
                    headers: {
                        Accept: "application/json",
                    },
                };
                await axios
                    .request(options)
                    .then((response) => {
                        petLocation = response;
                    })
                    .catch((error) => {
                        console.log(error);
                    });

                console.log(petLocation);

                //For pet
                var petIcon = L.icon({
                    iconUrl: 'assets/img/pet.png',
                    iconSize: [50, 50],
                    iconAnchor: [25, 25]
                });
                var petLat = petLocation.data.pet_lat;
                var petLong = petLocation.data.pet_long;
                L.marker([petLat, petLong], {
                        icon: petIcon
                    }).addTo(map)
                    .bindPopup('Pet Location', {
                        autoPan: false
                    })
                    .openPopup();

                //For Circle polygon
                // let _allowedDistance = this.allowedDistance * 1000; // in KM
                let _allowedDistance = this.allowedDistance * 1;
                L.circle([userLat, userLong], _allowedDistance).addTo(map);

                let distance = this.getDistance([petLat, petLong], [userLat, userLong]);
                if(distance > _allowedDistance){
                    this.petOutOfRange = true;
                }
                else{
                    this.petOutOfRange = false;
                }
                //Into KM
                distance = (distance / 1000).toFixed(4);
                this.petDistance = distance;

                console.log(distance);
                this.delay(60000).then(() => this.getLocation());
            },

            //Compute the distance in meters
            getDistance(origin, destination) {
                // return distance in meters
                var lon1 = this.toRadian(origin[1]),
                    lat1 = this.toRadian(origin[0]),
                    lon2 = this.toRadian(destination[1]),
                    lat2 = this.toRadian(destination[0]);

                var deltaLat = lat2 - lat1;
                var deltaLon = lon2 - lon1;

                var a = Math.pow(Math.sin(deltaLat / 2), 2) + Math.cos(lat1) * Math.cos(lat2) * Math.pow(Math.sin(deltaLon / 2), 2);
                var c = 2 * Math.asin(Math.sqrt(a));
                var EARTH_RADIUS = 6371;
                return c * EARTH_RADIUS * 1000;
            },

            toRadian(degree) {
                return degree * Math.PI / 180;
            },
            //End Compute the distance in meters

            //Upload Pet's Location
            async getPetsLocation() {

            },

            //Function for delay
            delay(time) {
                return new Promise(resolve => setTimeout(resolve, time));
            },

            showError(error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        this.long = "User denied the request for Geolocation."
                        break;
                    case error.POSITION_UNAVAILABLE:
                        this.long = "Location information is unavailable."
                        break;
                    case error.TIMEOUT:
                        this.long = "The request to get user location timed out."
                        break;
                    case error.UNKNOWN_ERROR:
                        this.long = "An unknown error occurred."
                        break;
                }
            }


        },

        async mounted() {
            this.getLocation();
        }
    });
</script>

<script>
    // Before Markers here



    // L.marker([15.158857, 120.632324]).addTo(map)
    // .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
    // .openPopup();
</script>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->

</html>