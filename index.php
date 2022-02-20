<?php
require_once("process_index.php");
include("head.php");
$_SESSION['sidebar'] = "newsfeed";
?>
<title>
  Active Arcade - Dashboard
</title>

<body class="g-sidenav-show  bg-gray-200">
  <?php include("aside.php"); ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <!-- End Navbar -->

    <!-- Vue App Here -->
    <span id="vueApp" class="show">

      <!-- Snackbar -->
      <div class="snack-wrap" v-if="showSnackBar" @click="showSnackBar=false">
        <input type="checkbox" class="snackclose animated" id="close" /><label class="snacklable animated" for="close"></label>
        <div class="snackbar animated">
          <p><strong>Notice:</strong> {{snackBarMessage}} <br>
            <span style="font-size: 12px !important;">Click to dismiss.</span>
          </p>
        </div>
      </div>
      <!-- End Snackbar -->

      <div class="container-fluid py-4">
        <div class="row mb-4">

          <div class="col-lg-9 col-md-8 mb-md-0 mb-4" style="display: none;">
            <div class="card">
              <div class="card-header pb-0 bg-gradient-success">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6 class="text-white"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></h6>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pb-2" style="display: none;">
                <form @submit.prevent="postCaption">
                  <!-- <div class="card p-2 m-2"> -->
                  <div class="card-body px-0 pb-2 m-2">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="ms-3">
                          <h6>What is in your mind?</h6>
                          <textarea class="form-control" minlength="4" rows="4" style="border: 1px solid" v-model="caption"></textarea>
                        </div><br>
                        <div class="text-end">
                          <button class="btn btn-sm btn-success" type="submit" :disabled="addingPost"> {{btnMessage}}</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- </div> -->
                </form>
                <!-- Posts will be shown here -->
                <span v-for="u in userPosts">
                  <div class="card p-2 m-2 shadow-lg mb-3" style="border-top: 2px solid #60B764;">
                    <div class="card-header pb-0">
                      <div class="row">
                        <div class="col-lg-12 col-12">
                          <h6>{{u.firstname}} {{u.firstname}}</h6>
                        </div>
                      </div>
                    </div>
                    <div class="card-body px-0 pb-2 m-2">
                      <div class="ms-3">{{u.user_post}}</div>
                      <div class="text-end">{{u.date_added}}</div>
                    </div>
                  </div>
                </span>
                <!-- End posts here -->
              </div>
            </div>
          </div>

          <?php $role = $_SESSION['role']; ?>
          <div class="col-lg-12 col-md-12" style="<?php if ($role != 1) {
                                                    echo "display: none";
                                                  } ?>">
            <div class="card h-100">
              <div class="card-header pb-0">
                <h6>Users</h6>
              </div>
              <div class="card-body p-3">
                <div class="timeline-one-side">
                  <span v-if="!friendSuggestions.length">
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <i class="fas fa-flag text-success"></i>
                      </span>
                      <div class="timeline-content">
                        <span class="text-dark text-sm mb-0">No suggestions at the moment.</span>
                      </div>
                    </div>
                  </span>
                  <span v-for="s in friendSuggestions">
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <i class="fa fa-user text-success text-gradient"></i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-dark font-weight-bold mb-0"><a :href="'profile.php?user='+s.id" target="_blank">{{s.firstname}} {{s.lastname}}</a></h6>
                        <!-- <a href="#" class="text-secondary font-weight-bold text-xs mt-1 mb-0" @click="sendRequest(s.id)">+ Send Link Request</a> -->
                      </div>
                    </div>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <?php if ($role == 2 || $role == 3) { ?>


            <div style="margin-bottom: 2%;" class="col-lg-12 col-md-12" v-if="!confirmBluetooth">
              <div class="card h-100">
                <div class="card-header pb-0">
                  <h6>Attention</h6>
                </div>
                <div class="card-body p-3">
                  <span>Please make sure that bluetooth watch is connected to your smartphone or your laptop. Click confirm after successfully connecting the watch.</span>
                  <button style="float: right;" class="btn btn-success text-white" @click="confirmBluetoothConnection">Confirm Connection.</button>
                </div>
              </div>
            </div>

            <div style="margin-bottom: 2%;" class="col-lg-12 col-md-12" v-if="!doneLoading && confirmBluetooth">
              <div class="card h-100">
                <div class="card-header pb-0">
                  Please Wait
                </div>
                <div class="card-body p-3">
                  <div style="text-align: center;">
                      <div class="lds-ripple"><div></div><div></div></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" v-if="doneLoading">
              <div class="col-xl-12">
                <div class="row">
                  <div class="col-md-12 col-lg-3 m-4">
                    <div class="card">
                      <div class="card-header mx-3 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-danger shadow text-center border-radius-lg">
                          <i class="material-icons opacity-10">favorite</i>
                        </div>
                      </div>
                      <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">Heart Rate</h6>
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0">{{heartRate}}</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 col-lg-3 m-4">
                    <div class="card">
                      <div class="card-header mx-3 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg">
                          <i class="material-icons opacity-10">hot_tub</i>
                        </div>
                      </div>
                      <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">Temperature</h6>
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0">{{temperature}}</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 col-lg-3 m-4">
                    <div class="card">
                      <div class="card-header mx-3 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                          <i class="material-icons opacity-10">bubble_chart</i>
                        </div>
                      </div>
                      <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">Oxygen Saturation</h6>
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0">{{oxygen}}</h5>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            
            <div style="margin-top: 2%; display: none;" class="col-lg-12 col-md-12">
              <div class="card h-100">
                <div class="card-header pb-0">
                  <h6>Vital Statistics</h6>
                </div>
                <div class="card-body p-3">
                  <div class="col-lg-6">
                    <i class="fa fa-heart" style="font-size:48px;color:red"></i>
                    Heart Rate:
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>

      </div>
      </div>

      <?php include("footer.php"); ?>
      </div>

      <!-- Start Modal -->
      <!-- Start Accept Modal -->
      <div id="confirm-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Accept Link Request?</h4>
            </div>
            <div class="modal-body">
              <p>Proceed?</p>
            </div>
            <div class="modal-footer">
              <button type="button" href="#" class="btn btn-success" @click="confirmLinkRequest()" data-dismiss="modal">Confirm</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Accept Modal -->

      <!-- Start Reject Modal -->
      <div id="reject-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Reject Link Request?</h4>
            </div>
            <div class="modal-body">
              <p>Proceed? This will delete the link request.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" @click="deleteLinkRequest()">Confirm</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Reject Modal -->
      <!-- End Modal -->


    </span>
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

        //Loop Control
        confirmBluetooth: false,
        doneLoading: false,

        //Heart Rate
        minBpm: 60,
        maxBpm: 100,
        heartRate: 0,

        //Temperature
        minTemperature: 36.1,
        maxTemperature: 37.2,
        temperature: 0,

        //Oxygen Saturation
        minOxygen: 95,
        maxOxygen: 100,
        oxygen: 0,

        //Friends
        friendSuggestions: [],
        linkRequests: [],
        requestId: null,
      }
    },
    methods: {
      editInformation() {
        this.isEdit = !this.isEdit;

      },

      //Post Caption
      async postCaption() {
        this.addingPost = true;
        this.btnMessage = "Posting..."
        const options = {
          method: "POST",
          url: "process_index.php?postCaption=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
          data: {
            caption: this.caption,
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.showSnackBar = true;
            this.snackBarMessage = response.data.response;
            this.caption = "";
          })
          .catch((error) => {
            console.log('error!')
          });
        this.addingPost = false;
        this.btnMessage = "Post";
        await this.getCaption();
      },

      //Get Friends Lists
      async getFriends() {
        const options = {
          method: "GET",
          url: "process_index.php?getFriends=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
        };
        await axios
          .request(options)
          .then((response) => {
            console.log(response);
            this.friendSuggestions = response.data;
          })
          .catch((error) => {
            this.showSnackBar = true;
            this.snackBarMessage = "There is an error getting the friend suggestion. Please try again.";
          });
      },

      //Get Link Request
      async getLinkRequest() {
        const options = {
          method: "GET",
          url: "process_index.php?getLinkRequest=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.linkRequests = response.data;
          })
          .catch((error) => {
            console.log('There is an error processing the request!');
          });
      },

      //Send Link Request
      async sendRequest(id) {
        this.showSnackBar = true;
        this.snackBarMessage = "Sending Request";
        const options = {
          method: "POST",
          url: "process_index.php?sendRequest=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
          data: {
            from_user_id: <?php echo $_SESSION['user_id']; ?>,
            to_user_id: id,
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.showSnackBar = true;
            this.snackBarMessage = response.data.response;
          })
          .catch((error) => {
            console.log('There is an error processing the request!');
            this.snackBarMessage = 'There is an error processing the request!';
          });
        await this.getFriends();
      },

      //Initiate ID
      async setRequestId(id) {
        this.requestId = id;
        console.log(this.requestId);
      },

      //Confirm Link Request
      async confirmLinkRequest() {
        console.log('confirmLinkRequest');
        this.showSnackBar = true;
        this.snackBarMessage = "Accepting request...";
        let _to_user_id = <?php echo $_SESSION['user_id']; ?>;
        let _from_user_id = this.requestId;
        const options = {
          method: "POST",
          url: "process_index.php?confirmRequest=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
          data: {
            from_user_id: _from_user_id,
            to_user_id: _to_user_id,
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.showSnackBar = true;
            this.snackBarMessage = response.data.response;
          })
          .catch((error) => {
            console.log('There is an error processing the request!');
            this.snackBarMessage = 'There is an error processing the request!';
          });

        await this.getLinkRequest();
      },

      //Reject Request
      async deleteLinkRequest() {
        console.log('cancelRequest');
        this.showSnackBar = true;
        this.snackBarMessage = "Rejecting request...";
        let _to_user_id = <?php echo $_SESSION['user_id']; ?>;
        let _from_user_id = this.requestId;
        const options = {
          method: "POST",
          url: "process_index.php?cancelRequest=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
          data: {
            from_user_id: _from_user_id,
            to_user_id: _to_user_id,
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.showSnackBar = true;
            this.snackBarMessage = response.data.response;
          })
          .catch((error) => {
            console.log('There is an error processing the request!');
            this.snackBarMessage = 'There is an error processing the request!';
          });
        await this.getLinkRequest();
        await this.getFriends();
      },

      //Get Friends Posts
      async getCaption() {
        const options = {
          method: "GET",
          url: "process_index.php?getCaption=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.userPosts = response.data
          })
          .catch((error) => {
            this.showSnackBar = true;
            this.snackBarMessage = "There is an error getting the information. Please try again.";
          });
      },


      //Get Vital Statistics
      getVitalStats() {
        this.heartRate = Math.floor(Math.random() * (this.maxBpm - this.minBpm + 1)) + this.minBpm;


        //Normalize Heart rate randomly
        if (Math.random() <= 0.5) {
          this.minBpm = this.heartRate + 0.5;
          this.maxBpm = this.heartRate + 0.5;
        } else {
          this.minBpm = this.heartRate - 0.5;
          this.maxBpm = this.heartRate - 0.5;
        }

        this.temperature = Math.random() * (this.maxTemperature - this.minTemperature + 1) + this.minTemperature;

        //Normalize Heart Tempereture randomly
        // if(Math.random() <= 0.5){
        //   this.minTemperature = this.temperature - 0.1;
        //   this.maxTemperature = this.temperature + 0.1;
        // }
        // else{
        //   this.minTemperature = this.temperature + 0.1;
        //   this.maxTemperature = this.temperature - 0.1;
        // }

        this.temperature = this.temperature.toFixed(1);

        this.oxygen = Math.floor(Math.random() * (this.maxOxygen - this.minOxygen + 1)) + this.minOxygen;

        this.intervalFunction();
      },

      //Interval Here
      intervalFunction() {
        // this.getVitalStats();
        setTimeout(this.getVitalStats, 10000);
      },

      //UI mostly
      confirmBluetoothConnection(){
          this.confirmBluetooth = true;
          setTimeout(this.doneLoadingFunction, 5000);
      },
      doneLoadingFunction(){
          this.doneLoading = true;
      }
    },

    async mounted() {
      await this.getCaption();
      await this.getFriends();
      await this.getLinkRequest();
      await this.getCaption();
      this.getVitalStats();
    }
  });
</script>
<style>
.lds-ripple {
  display: inline-block;
  position: relative;
  width: 220px;
  height: 220px;
}
.lds-ripple div {
  position: absolute;
  border: 4px solid black;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripple {
  0% {
    top: 100px;
    left: 100px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: 0px;
    left: 0px;
    width: 200px;
    height: 200px;
    opacity: 0;
  }
}  
</style>
</html>