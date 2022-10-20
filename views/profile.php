<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../helpers/profile.php');
require_once('../partials/head.php');
?>

<body class="g-sidenav-show  bg-gray-200">
    <!-- Sidebar -->
    <?php require_once('../partials/navbar.php'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">My Profile</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="profile" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Profile</span>
                            </a>
                        </li>
                    </ul>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                </div>
            </div>
        </nav> <!-- End Navbar -->
        <?php
        $admin_id = mysqli_real_escape_string($mysqli, $_SESSION['admin_id']);
        $ret = "SELECT * FROM administrator WHERE admin_id = '{$admin_id}'";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($admin = $res->fetch_object()) {
        ?>
            <div class="container-fluid py-4">
                <h6><?php echo $admin->admin_name; ?> Profile Details</h6>
                <div class="row mb-4">
                    <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-6">
                                        <h6>Update User Profile Details</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Full Names</label>
                                        <input type="text" required name="admin_name" value="<?php echo $admin->admin_name; ?>" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" required name="admin_email" value="<?php echo $admin->admin_email; ?>" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" required name="admin_phone_number" value="<?php echo $admin->admin_phone_number; ?>" class="form-control">
                                    </div>
                                    <div class="text-left">
                                        <button type="submit" name="Update_My_Account" class="btn btn-success">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-6">
                                        <h6>Update Login Password</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" required name="new_password" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" required name="confirm_password" class="form-control">
                                    </div>
                                    <div class="text-left">
                                        <button type="submit" name="Update_Passwords" class="btn btn-success">Update Passwords</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  }
        ?>
    </main>

    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>