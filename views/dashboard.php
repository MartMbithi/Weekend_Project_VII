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
        <?php require_once('../partials/sidebar.php'); ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
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
                                <i class="material-icons opacity-10">person</i>
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
                                <i class="material-icons opacity-10">person</i>
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
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Check In </th>
                                            <th>Check Out</th>
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
                                                <td><?php echo $visitors->visitor_phone_number; ?></td>
                                                <td><?php echo $visitors->visitor_email; ?></td>
                                                <td><?php echo $visitors->visitor_check_in_date_time; ?></td>
                                                <td><?php echo $visitors->visitor_check_out_date_time; ?></td>
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