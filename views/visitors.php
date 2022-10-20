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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Visitors</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Visitors</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="logout" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Log Out</span>
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
                                            <th>Dates </th>
                                            <th>Where Visited</th>
                                            <th>Actions</th>
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
                                                    <b>Phone:</b> <?php echo $visitors->visitor_phone_number; ?><br>
                                                    <b>Email:</b> <?php echo $visitors->visitor_email; ?>
                                                </td>
                                                <td>
                                                    <b>Check In: </b> <?php echo $visitors->visitor_check_in_date_time; ?><br>
                                                    <b>Check Out:</b> <?php echo $visitors->visitor_check_out_date_time; ?>
                                                </td>
                                                <td><?php echo $visitors->visitor_where_visiting; ?></td>
                                                <td>
                                                    <a data-bs-toggle="modal" href="#update_<?php echo $visitors->visitor_id; ?>" class="badge btn-sm btn-primary"> Edit</a>
                                                    <a data-bs-toggle="modal" href="#delete_<?php echo $visitors->visitor_id; ?>" class="badge btn-sm btn-danger"> Delete</a>
                                                </td>
                                            </tr>
                                            <!-- Update Modal -->
                                            <div class="modal fade fixed-right" id="update_<?php echo $visitors->visitor_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog  modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header align-items-center">
                                                            <div class="text-bold">
                                                                <h6 class="text-bold">Update <?php echo $visitors->visitor_names; ?> Details</h6>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete_<?php echo $visitors->visitor_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body text-center text-danger">
                                                                <h4>Delete <?php echo $visitors->visitor_names; ?> Details?</h4>
                                                                <br>
                                                                <!-- Hide This -->
                                                                <input type="hidden" name="visitor_id" value="<?php echo $visitors->visitor_id; ?>">
                                                                <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                                                                <input type="submit" name="Delete_Visitor" value="Delete" class="text-center btn btn-danger">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
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