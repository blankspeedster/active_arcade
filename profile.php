<?php
require_once("process_profile.php");
include("head.php");
$_SESSION['sidebar'] = "profile";
$session_user_id = $_SESSION['user_id'];

if (isset($_GET['user'])) {
    $current_user = $_GET['user'];
} else {
    $current_user = $session_user_id;
}

//Personal or others
if ($current_user == $session_user_id) {
    $profile = "personal";
} else {
    $profile = "others";
}


$users = mysqli_query($mysqli, "SELECT *, u.id AS user_id
    FROM users u
    JOIN role r
    ON r.id = u.role
    WHERE u.id = '$current_user' ");
$user = $users->fetch_array();
?>
<title>SPCF Cashless - Profile</title>

<body class="g-sidenav-show bg-gray-200" id="app">

    <?php include("aside.php"); ?>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="col-12">
                <?php if (isset($_SESSION['profileError'])) { ?>
                    <!-- Alert Here -->
                    <nav class="navbar navbar-expand-lg border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4 blur">
                        <div class="container-fluid ps-2 pe-0">
                            <?php
                            echo $_SESSION['profileError'];
                            unset($_SESSION['profileError']);
                            ?>
                        </div>
                    </nav>
                    <!-- End Here -->
                <?php } ?>
            </div>
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

                <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('./assets/img/profile-background.jpg');">
                    <span class="mask bg-gradient-success opacity-6"></span>
                </div>
                <div class="card card-body mx-3 mx-md-4 mt-n6">
                    <div class="row gx-4 mb-2">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="./assets/img/profile-picture/dp.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    <?php echo $user['firstname'] . ' ' . $user['lastname']; ?>
                                    <!--                  Richard Davis-->
                                </h5>
                                <p class="mb-0 font-weight-normal text-sm">
                                    <?php echo ucfirst($user['code']); ?>
                                    <!--                  CEO / Co-Founder-->
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                            <div class="card bg-gradient-success">
                                <div class="card-header pb-0 bg-gradient-success">
                                    <div class="row">
                                        <div class="col-lg-6 col-7">
                                            <?php if ($profile == "personal") { ?>
                                                <h6 class="text-white">Your Timeline</h6>
                                            <?php } else { ?>
                                                <h6 class="text-white">Timeline</h6>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-2">

                                    <!-- Post a caption here -->
                                    <?php if ($profile == "personal") { ?>
                                        <form @submit.prevent="postCaption">
                                            <div class="card p-2 m-2">
                                                <div class="card-header pb-0">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12">
                                                            <h6><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body px-0 pb-2 m-2">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ms-3">
                                                                <textarea class="form-control" minlength="4" rows="4" style="border: 1px solid" v-model="caption"></textarea>
                                                            </div><br>
                                                            <div class="text-end">
                                                                <button class="btn btn-sm btn-success" type="submit" :disabled="addingPost"> {{btnMessage}}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php }  ?>
                                    <!-- End post a caption here -->

                                    <!-- Posts will be shown here -->
                                    <?php ?>
                                    <span v-for="post in userPosts">
                                        <div class="card p-2 m-2">
                                            <div class="card-header pb-0">
                                                <div class="row">
                                                    <div class="col-lg-12 col-12">
                                                        <span class="h6"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></span>
                                                        <span style="float: right;">
                                                            <a class="btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-h"></i>
                                                            </a>
                                                            <div class="dropdown-menu shadow-success">
                                                                <a class="dropdown-item" href="#">Edit Post</a>
                                                                <!-- <a class="dropdown-item" href="profile.php?user=<?php echo $user['user_id']; ?>" target="_blank">View Profile</a> -->
                                                                <button class="dropdown-item" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delete</button>
                                                                <div class="dropdown-menu shadow-danger mb-1">
                                                                    <span class="dropdown-item">Confirm Deletion of post? This cannot be undone.</span>
                                                                    <a class="dropdown-item text-success" href="#">Cancel</a>
                                                                    <a class="dropdown-item text-danger" @click="deletePost(post.id)">Confirm Delete</a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body px-0 pb-2 m-2">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="ms-3">{{ post.user_post }}</div>
                                                        <div class="text-end">{{ post.date_added }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    <?php ?>
                                    <!-- End posts here -->

                                </div>
                            </div>
                        </div>

                        <!-- Update Basic Information Here -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100">
                                <div class="card-header pb-0">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Profile Information</h6>
                                        </div>
                                    </div>
                                    <p class="text-sm">
                                        <?php echo ucwords($user['description']); ?>
                                    </p>
                                </div>
                                <div class="card-body p-3">
                                    <button class="btn btn-sm btn-success" @click="editInformation" v-if="!isEdit"><i class="fas fa-edit"></i> Edit Information</button>
                                    <button class="btn btn-sm btn-warning" @click="editInformation" v-if="isEdit">Cancel</button>
                                    <hr class="horizontal gray-light">
                                    <!-- Start Profile Information here -->
                                    <ul class="list-group" v-if="!isEdit">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; <?php echo $user['firstname'] . ' ' . $user['lastname']; ?></li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Phione Number:</strong> &nbsp; <?php echo $user['phone_number'] ?></li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?php echo $user['email'] ?></li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; Systems Plus College Foundation</li>
                                    </ul>
                                    <div v-else>
                                        <form method="post" action="process_profile.php">
                                            <div class="input-group input-group-static mb-3">
                                                First Name
                                                <input type="text" class="form-control" value="<?php echo $user['firstname'] ?>" name="fname" required>
                                            </div>
                                            <div class="input-group input-group-static mb-3">
                                                Last Name
                                                <input type="text" class="form-control" value="<?php echo $user['lastname'] ?>" name="lname" required>
                                            </div>
                                            <div class="input-group input-group-static mb-3">
                                                Phone Number
                                                <input type="text" class="form-control" value="<?php echo $user['phone_number'] ?>" name="phone_number" required>
                                            </div>
                                            <div class="input-group input-group-static mb-3">
                                                Email
                                                <input type="text" class="form-control" value="<?php echo $user['email'] ?>" name="email" required>
                                            </div>
                                            <input type="text" style="visibility: hidden;" value="<?php echo $current_user; ?>" name="user_id">
                                            <br>
                                            <button class="btn btn-sm btn-success" type="submit" name="update_profile"><i class="far fa-save"></i> Update Information</button>
                                        </form>
                                    </div>
                                    <!-- End Profile Information here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include("footer.php"); ?>
            </span>
            <!-- End Vue App Here -->


        </div>
        <!--   Core JS Files   -->
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
                    url: "process_profile.php?postCaption=" + <?php echo $current_user; ?>,
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

            //Get Caption
            async getCaption() {
                const options = {
                    method: "POST",
                    url: "process_profile.php?getCaption=" + <?php echo $current_user; ?>,
                    headers: {
                        Accept: "application/json",
                    },
                };
                await axios
                    .request(options)
                    .then((response) => {
                        console.log(response);
                        this.userPosts = response.data
                    })
                    .catch((error) => {
                        this.showSnackBar = true;
                        this.snackBarMessage = "There is an error getting the information. Please try again.";
                    });
            },

            //Delete Post
            async deletePost(id){
                this.btnMessage = "Deleting.."
                const options = {
                    method: "POST",
                    url: "process_profile.php?deletePost=" + id,
                    headers: {
                        Accept: "application/json",
                    },
                    data: {
                        postId: id,
                    },
                };
                await axios
                    .request(options)
                    .then((response) => {
                        this.showSnackBar = true;
                        this.snackBarMessage = response.data.response;
                    })
                    .catch((error) => {
                        console.log('error!')
                    });
                await this.getCaption();
            }


        },
        mounted() {
            this.getCaption();
        }
    });
</script>

</html>