<?php
require_once("process_index.php");
include("head.php");
$_SESSION['sidebar'] = "Pet Tracking";
$current_user = $_SESSION['user_id'];

?>
<title>
  PawsBook - Track Pet
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
                    <h6 class="text-white"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></h6>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <p class="m-4">Long: {{long}} <br>Lat: {{lat}}</p>
                <p class="m-4"><b>Please put this tracker safely into a harness. Thank you!</b></p>
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

      showPosition(position) {
        this.lat = position.coords.latitude;
        this.long = position.coords.longitude;

        var petLat = this.lat;
        var petLong = this.long;

        //Show Markers
        var container = L.DomUtil.get('map'); if(container != null){ container._leaflet_id = null; }
        var map = L.map('map').setView([petLat, petLong], 13);
        var gl = L.mapboxGL({
          attribution: "\u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
          style: 'https://api.maptiler.com/maps/osm-standard/style.json?key=gcypTzmAMjrlMg46MJG3#5.9/16.04327/120.29239'
        }).addTo(map);

        var petIcon = L.icon({
          iconUrl: '../assets/img/pet.png',
          iconSize: [50, 50],
          iconAnchor: [25, 25]
        });

        // L.marker([petLat, petLong]).addTo(map).bindPopup();

        L.marker([petLat, petLong], {
            icon: petIcon
          }).addTo(map)
          .bindPopup('Pet Location', {
            autoPan: false
          })
          .openPopup();

        // L.marker([15.15000, 120.6320]).addTo(map)
        // .bindPopup('Your Location',{draggable:false})
        // .openPopup();
        // this.uploadPetsLocation(petLat, petLong);
        this.uploadPetsLocation(petLat, petLong);
      },

      //Upload Pet's Location
      uploadPetsLocation(lat, long) {
        // console.log(lat+" "+long);
        var pet_lat = lat;
        var pet_long = long;
        const options = {
          method: "POST",
          url: "process_index.php?uploadPetLocation=" + <?php echo $current_user;?>+"&lat="+pet_lat+"&long="+pet_long,
          headers: {
            Accept: "application/json",
          },
          data: {
            pet_lat: lat,
            pet_long: long,
          },
        };
        axios
          .request(options)
          .then((response) => {
            console.log(response);
          })
          .catch((error) => {
            console.log(error);
          });
        
        this.delay(20000).then(() => this.getLocation());
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