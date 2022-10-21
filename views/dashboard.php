<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../functions/admin_analytics.php');
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Administrator Dashboard</h6>
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
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">group</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Today's Visitors</p>
                                <h4 class="mb-0"><?php echo $visitors_visited_today; ?></h4>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">manage_accounts</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Administrators</p>
                                <h4 class="mb-0"><?php echo $administrator; ?></h4>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">badge</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Total Visitors</p>
                                <h4 class="mb-0"><?php echo $visitors; ?></h4>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
            </div>
            <div class="row mb-4">
                <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Recent Visitors Data Recorded</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>ID Number</th>
                                            <th>Contacts</th>
                                            <th>Dates</th>
                                            <th>Where Visited</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ret = "SELECT * FROM visitor";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($visitors = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $visitors->visitor_names; ?></td>
                                                <td><?php echo $visitors->visitor_id_number; ?></td>
                                                <td>
                                                    Phone: <?php echo $visitors->visitor_phone_number; ?><br>
                                                    Email: <?php echo $visitors->visitor_email; ?>
                                                </td>
                                                <td>
                                                    Check In: <?php echo $visitors->visitor_check_in_date_time; ?><br>
                                                    Check Out: <?php echo $visitors->visitor_check_out_date_time; ?>
                                                </td>
                                                <td><?php echo $visitors->visitor_where_visiting; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>