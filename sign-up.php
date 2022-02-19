<?php
    require_once('process_registration.php');

    if(isset($_SESSION['email'])){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    PawsBook - Register Account
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
          <?php if(isset($_SESSION['registerError'])){ ?>
          <!-- Alert Here -->
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
              <div class="container-fluid ps-2 pe-0">
                  <?php
                  echo $_SESSION['registerError'];
                  unset($_SESSION['registerError']);
                  ?>
              </div>
          </nav>
          <!-- End Navbar -->
          <!-- End Here -->
          <?php } ?>
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-success h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('assets/img/signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body">
                  <form role="form" action="process_registration.php" method="post">
                  <div class="input-group input-group-static mb-4">
                      <label for="formControlSelectRole" class="ms-0">Signing up for: </label>
                      <select class="form-control" id="formControlSelectRole" name="role" required>
                          <option value="" disabled selected>Select</option>
                          <option value="2">User</option>
                          <option value="3">Clinic</option>
                      </select>
                    </div>
                    <div class="input-group input-group-static mb-3">
                      <label class="form-label">First Name</label>
                      <input type="text" class="form-control" value="<?php if(isset($_GET['fname'])){echo $_GET['fname'];} ?>" name="fname" required>
                    </div>
                    <div class="input-group input-group-static mb-3">
                      <label class="form-label">Last Name</label>
                      <input type="text" class="form-control" value="<?php if(isset($_GET['lname'])){echo $_GET['lname'];} ?>" name="lname" required>
                    </div>
                    <div class="input-group input-group-static mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" name="email" required>
                    </div>
                    <div class="input-group input-group-static mb-3">
                      <label class="form-label">Phone</label>
                      <input type="number" class="form-control" value="<?php if(isset($_GET['phone_number'])){echo $_GET['phone_number'];} ?>" name="phone_number" required>
                    </div>
                    <div class="input-group input-group-static mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" id="password" value="" onkeyup="checkPasswords();">
                    </div>

                    <div class="input-group input-group-static mb-3">
                      <label class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" onkeyup="checkPasswords();">
                    </div>
                    <button disabled id="password-message" class="btn btn-block"></button>
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="register_account" id="register_account" class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="sign-in.php" class="text-success text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script>
      document.getElementById("register_account").disabled = true;
      let checkPasswords = function() {
          console.log('Checking passwords here');
          if(document.getElementById('password').value == ""){
              document.getElementById('password-message').innerHTML = 'Password is empty';
          }
          else if(document.getElementById('password').value == document.getElementById('confirm_password').value){
              document.getElementById('password-message').style.color = 'green';
              document.getElementById('password-message').innerHTML = 'Passwords matched';
              document.getElementById("register_account").disabled = false;
          }
          else{
              document.getElementById('password-message').style.color = 'red';
              document.getElementById('password-message').innerHTML = 'Passwords do not match!';
              document.getElementById("register_account").disabled = true;
          }

          setTimeout(checkPasswords, 500);
      }

      checkPasswords();

      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
          var options = {
              damping: '0.5'
          }
          Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
  </script>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>

</body>

</html>