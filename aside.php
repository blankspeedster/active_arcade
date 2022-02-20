<?php
    if(!isset($_SESSION['email'])){
        header("Location: sign-in.php");
    }
    $role = $_SESSION['role'];
?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php" target="_blank">
        <img src="./assets/logo-white.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Active Arcade</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?php if($_SESSION['sidebar'] == "newsfeed"){echo "active bg-gradient-success";} ?>" href="index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <?php if($role == 1){ ?>
        <li class="nav-item">
          <a class="nav-link text-white <?php if($_SESSION['sidebar'] == "users"){echo "active bg-gradient-success";} ?>" href="users.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-users"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
          <?php } ?>

        <li class="nav-item" style="display: none;">
          <a class="nav-link text-white <?php if($_SESSION['sidebar'] == "billing"){echo "active bg-gradient-success";} ?>" href="billing.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php if($_SESSION['sidebar'] == "profile"){echo "active bg-gradient-success";} ?>" href="profile.php">
            <div class="text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>

  </aside>