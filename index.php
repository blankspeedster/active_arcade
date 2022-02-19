<?php
require_once("process_index.php");
include("head.php");
$_SESSION['sidebar'] = "newsfeed";
?>
<title>
  PawsBook - Dashboard
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

          <div class="col-lg-9 col-md-8 mb-md-0 mb-4">
            <div class="card">
              <div class="card-header pb-0 bg-gradient-success">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6 class="text-white"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></h6>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
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

          <div class="col-lg-3 col-md-3">
            <div class="card h-100">
              <div class="card-header pb-0">
                <h6>Find Friends</h6>
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
                        <a href="#" class="text-secondary font-weight-bold text-xs mt-1 mb-0" @click="sendRequest(s.id)">+ Send Link Request</a>
                      </div>
                    </div>
                  </span>
                </div>
              </div>

              <div class="card-header pb-0">
                <h6>Link Requests</h6>
              </div>
              <div class="card-body p-3">
                <div class="timeline-one-side">
                  <span v-if="!linkRequests.length">
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <i class="fas fa-flag text-success"></i>
                      </span>
                      <div class="timeline-content">
                        <span class="text-dark text-sm mb-0">No pending request.</span>
                      </div>
                    </div>
                  </span>
                  <span v-else v-for="l in linkRequests">
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <i class="fa fa-user text-success text-gradient"></i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-dark font-weight-bold mb-0"><a :href="'profile.php?user='+l.id" target="_blank">{{l.firstname}} {{l.lastname}}</a></h6>
                        <a type="button" class="text-secondary font-weight-bold text-xs mt-1 m-1" data-toggle="modal" data-target="#confirm-modal" @click="setRequestId(l.id)">
                          <i class="fas fa-check text-success"></i> Accept
                          </button>
                          <a type="button" class="text-secondary font-weight-bold text-xs mt-1 m-1" data-toggle="modal" data-target="#reject-modal" @click="setRequestId(l.id)">
                            <i class="fas fa-times text-danger"></i> Reject
                            </button>
                      </div>
                    </div>
                  </span>

                </div>
              </div>
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
    },

    async mounted() {
      await this.getCaption();
      await this.getFriends();
      await this.getLinkRequest();
      await this.getCaption();
    }
  });
</script>

</html>