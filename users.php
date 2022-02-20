<?php
require_once("process_users.php");
include("head.php");
$_SESSION['sidebar'] = "users";
$session_user_id = $_SESSION['user_id'];
$users = mysqli_query($mysqli, "SELECT *, u.id AS user_id
    FROM users u
    JOIN role r
    ON r.id = u.role ");
// Current Status Action
$isAdding = true;
if (isset($_GET['edit_user'])) {
  $isAdding = false;
}
?>


<title>
  SPCF Cashless - Users
</title>

<body class="g-sidenav-show  bg-gray-200">
  <?php include("aside.php"); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <?php if (isset($_SESSION['userError'])) { ?>
            <!-- Alert Here -->
            <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
              <div class="container-fluid ps-2 pe-0">
                <?php
                echo $_SESSION['userError'];
                unset($_SESSION['userError']);
                ?>
              </div>
            </nav>
            <!-- End Here -->
          <?php } ?>
        </div>
        <!-- Add users here -->
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Add / Edit User</h6>
              </div>
            </div>
            <div class="card mt-4">
              <div class="card-body p-3">
                <form action="process_users.php" method="post">
                  <div class="row m-1">
                    <div class="col-md-6 d-flex align-items-center">
                      <div class="input-group input-group-static mb-4">
                        <label for="formControlSelectRole" class="ms-0">Signing up for: </label>
                        <select class="form-control" id="formControlSelectRole" name="role" value="<?php if(!$isAdding){echo  $user['role_id'];} ?>" required>
                          <option value="" disabled selected>Signing Up For </option>
                          <option value="1">Admin</option>
                          <option value="2">User</option>
                          <option value="3">Doctor</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="input-group input-group-static mb-4">
                        First Name
                        <input type="text" class="form-control" value="<?php if(!$isAdding){echo $user['firstname'];}else if(isset($_GET['fname'])){echo $_GET['fname']; } ?>" name="fname" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="input-group input-group-static mb-4">
                        Last Name
                        <input type="text" class="form-control" value="<?php if(!$isAdding){echo $user['lastname'];}else if(isset($_GET['lname'])){echo $_GET['lname']; } ?>" name="lname" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="input-group input-group-static mb-4">
                        Email Address
                        <input type="email" class="form-control" value="<?php if(!$isAdding){echo $user['email'];}else if(isset($_GET['email'])){echo $_GET['email']; } ?>" name="email" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="input-group input-group-static mb-4">
                        Phone Number
                        <input type="number" class="form-control" value="<?php if(!$isAdding){echo $user['phone_number'];}else if(isset($_GET['phone_number'])){echo $_GET['phone_number']; } ?>" name="phone_number" required>
                      </div>
                    </div>
                    <?php if ($isAdding) { ?>
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          Password
                          <input type="password" class="form-control" value="" name="password" id="password" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          Confirm Password
                          <input type="password" class="form-control" value="" name="email" id="confirm_password" required>
                        </div>
                      </div>
                      <button disabled id="password-message" class="btn btn-block"></button>
                      <div class="col-md-12 text-end">
                        <button class="btn btn-success text-white" type="submit" name="save_user" id="register_account"><i class="far fa-save"></i> Save Information</button>
                      </div>
                    <?php } else { ?>
                      <div class="col-md-12 text-end">
                        <input type="text" value="<?php echo $user['user_id']; ?>" name="user_id" style="visibility: hidden;">
                        <button class="btn btn-warning" type="submit" name="update_user"><i class="far fa-save"></i> Update Information</button>
                      </div>
                    <?php } ?>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Beging List users here -->
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">List of users</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><i class="fas fa-user"></i> Fullname</th>
                    <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><i class="fas fa-hashtag"></i> ID Number</th> -->
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><i class="fas fa-phone"></i> Phone Number</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="display: none;"><i class="fas fa-scroll"></i> Role</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><i class="fas fa-check"></i> Validation Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><i class="fas fa-ellipsis-v"></i> Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($user = mysqli_fetch_array($users)) { ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="assets/img/profile-picture/dp.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><a href="profile.php?user=<?php echo $user['id']; ?>" target="_blank"><?php echo $user["firstname"] . " " . $user["lastname"]; ?></a></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo $user['email']; ?></p>
                          </div>
                        </div>
                      </td>
                      <!-- <td>
                        <p class="text-xs text-secondary mb-0"><?php //echo $user['student_id']; ?></p>
                      </td> -->
                      <td>
                        <p class="text-xs text-secondary mb-0"><?php echo $user['phone_number']; ?></p>
                      </td>
                      <td class="align-middle text-center text-sm" style="display: none;">
                        <?php if ($user['role'] == 1) { ?>
                          <span class="badge badge-sm bg-gradient-success">Admin</span>
                        <?php } else if ($user['role'] == 2) { ?>
                          <span class="badge badge-sm bg-gradient-success">User</span>
                        <?php } else { ?>
                          <span class="badge badge-sm bg-gradient-warning">Clinic Owner</span>
                        <?php } ?>

                      </td>
                      <td class="align-middle text-center text-sm">
                        <?php if ($user['validated'] == 0) { ?>
                          <span class="badge badge-sm bg-gradient-primary">Pending</span>
                        <?php } else { ?>
                          <span class="badge badge-sm bg-gradient-success">Validated</span>
                        <?php } ?>
                      </td>
                      <td class="align-middle text-center text-sm">

                        <div class="btn-group">
                          <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                          </button>
                          <div class="dropdown-menu shadow-success">
                            <?php if ($user['validated'] != 1) { ?>
                              <a class="dropdown-item" href="process_users.php?validate_user=<?php echo $user['user_id']; ?>">Validate</a>
                            <?php } ?>
                            <a class="dropdown-item" href="users.php?edit_user=<?php echo $user['user_id']; ?>">Edit Information</a>
                            <a class="dropdown-item" href="profile.php?user=<?php echo $user['user_id']; ?>" target="_blank">View Profile</a>
                            <button class="dropdown-item" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delete</button>
                            <div class="dropdown-menu shadow-danger mb-1">
                              <span class="dropdown-item">All information related to this user will be permanent. You cannot undo the changes. Confirm Deletion?</span>
                              <a class="dropdown-item text-success" href="#">Cancel</a>
                              <a class="dropdown-item text-danger" href="process_users.php?delete_user=<?php echo $user['user_id']; ?>">Confirm Delete</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include("footer.php"); ?>

    </div>
  </main>
  <?php //include("fixed-plugin.php"); 
  ?>
  <?php include("core-js-files.php"); ?>
  <script>
    document.getElementById("register_account").disabled = true;
    let checkPasswords = function() {
      console.log('Checking passwords here');
      if (document.getElementById('password').value == "") {
        document.getElementById('password-message').innerHTML = 'Password is empty';
      } else if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
        document.getElementById('password-message').style.color = 'green';
        document.getElementById('password-message').innerHTML = 'Passwords matched';
        document.getElementById("register_account").disabled = false;
      } else {
        document.getElementById('password-message').style.color = 'red';
        document.getElementById('password-message').innerHTML = 'Passwords do not match!';
        document.getElementById("register_account").disabled = true;
      }

      setTimeout(checkPasswords, 500);
    }

    checkPasswords();
  </script>
</body>

</html>