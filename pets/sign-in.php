<?php
    require_once("process_registration.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    PawsBook
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="..assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="..assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <?php if(isset($_SESSION['loginError'])){ ?>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid ps-2 pe-0">
                        <?php
                            echo $_SESSION['loginError'];
                            unset($_SESSION['loginError']);
                        ?>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <?php } ?>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('assets/img/login.svg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-6 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0" style="font-size: 2rem;">Sign in to track your pet</h4>

                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" method="post" action="process_registration.php">
                  <div class="input-group input-group-static my-3">
                    <label style="font-size: 0.8rem;">Email</label>
                    <input type="text" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" class="form-control" style="font-size: 1rem;">
                  </div>
                  <div class="input-group input-group-static mb-3">
                    <label style="font-size: 0.8rem;">Password</label>
                    <input type="password" name="password" class="form-control" style="font-size: 1rem;">
                  </div>
<!--                  <div class="form-check form-switch d-flex align-items-center mb-3">-->
<!--                    <input class="form-check-input" type="checkbox" id="rememberMe">-->
<!--                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>-->
<!--                  </div>-->
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2" name="login" style="font-size: 0.9rem;">Sign in</button>
                  </div>
                  <p class="mt-4 text-center">
                    Don't have an account?
                    <a href="sign-up.php" class="text-success text-gradient font-weight-bold">Sign up</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <?php echo date("Y"); ?>,
                PawsBook
              </div>
            </div>
<!--            <div class="col-12 col-md-6">-->
<!--              <ul class="nav nav-footer justify-content-center justify-content-lg-end">-->
<!--                <li class="nav-item">-->
<!--                  <a href="https://www.creative-tim.com" class="nav-link text-white" target="_blank">Creative Tim</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">About Us</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                  <a href="https://www.creative-tim.com/blog" class="nav-link text-white" target="_blank">Blog</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">License</a>-->
<!--                </li>-->
<!--              </ul>-->
<!--            </div>-->
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>