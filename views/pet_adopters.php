<?php
/*
 *   Crafted On Sat Oct 15 2022
 *
 * 
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD End User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. GRANT OF LICENSE 
 *   Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   DEVLAN SOLUTIONS LTD  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF DEVLAN SOLUTIONS LTD HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL DEVLAN SOLUTIONS LTD  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */

session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../helpers/pet_adopters.php');
require_once('../partials/head.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once('../partials/navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once('../partials/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Pet Adopters</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pet Adopters</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <hr>
                    <div class="text-right">
                        <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-warning"> Add Pet Adopter</button>
                    </div>
                </div><!-- /.container-fluid -->
                <!-- Add Staff -->
                <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">
                                <div class="text-center">
                                    <h6 class="mb-0 text-bold"> Add Pet Adopter</h6>
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Full Names</label>
                                            <input type="text" required name="pet_adopter_name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Email Address</label>
                                            <input type="email" required name="pet_adopter_email" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Phone Number</label>
                                            <input type="text" required name="pet_adopter_phone_number" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Address</label>
                                            <input type="text" required name="pet_adopter_address" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Login Username</label>
                                            <input type="text" required name="login_username" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Login Password</label>
                                            <input type="password" required name="login_password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" name="Add_Pet_Adopter" class="btn btn-warning">Add Pet Adopter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Staff -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-warning card-outline">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Names</th>
                                                <th>Email</th>
                                                <th>Contacts</th>
                                                <th>Address</th>
                                                <th>Login Username</th>
                                                <th>Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ret = "SELECT * FROM login l
                                            INNER JOIN pet_adopter pa ON pa.pet_adopter_login_id  = l.login_id";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($adopter = $res->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $adopter->pet_adopter_name; ?></td>
                                                    <td><?php echo $adopter->pet_adopter_email; ?></td>
                                                    <td><?php echo $adopter->pet_adopter_phone_number; ?></td>
                                                    <td><?php echo $adopter->pet_adopter_address; ?></td>
                                                    <td><?php echo $adopter->login_username; ?></td>
                                                    <td>
                                                        <a data-toggle="modal" href="#update_<?php echo $adopter->pet_adopter_id; ?>" class="badge badge-primary"><i class="fas fa-edit"></i> Edit</a>
                                                        <a data-toggle="modal" href="#delete_<?php echo $adopter->pet_adopter_id; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a>
                                                    </td>
                                                    <!-- Update Modal -->
                                                    <div class="modal fade fixed-right" id="update_<?php echo $adopter->pet_adopter_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog  modal-xl" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header align-items-center">
                                                                    <div class="text-bold">
                                                                        <h6 class="text-bold">Update <?php echo $adopter->pet_adopter_name; ?> Account</h6>
                                                                    </div>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" enctype="multipart/form-data" role="form">
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="">Full Names</label>
                                                                                <input type="hidden" required name="pet_adopter_id" value="<?php echo $adopter->pet_adopter_id; ?>" class="form-control">
                                                                                <input type="text" required name="pet_adopter_name" value="<?php echo $adopter->pet_adopter_name; ?>" class="form-control">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="">Email Address</label>
                                                                                <input type="email" required name="pet_adopter_email" value="<?php echo $adopter->pet_adopter_email; ?>" class="form-control">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="">Phone Number</label>
                                                                                <input type="text" required name="pet_adopter_phone_number" value="<?php echo $adopter->pet_adopter_phone_number; ?>" class="form-control">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="">Address</label>
                                                                                <input type="text" required name="pet_adopter_address" value="<?php echo $adopter->pet_adopter_address; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-right">
                                                                            <button type="submit" name="Update_Pet_Adopters" class="btn btn-warning">Update Pet Adopter</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->

                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="delete_<?php echo $adopter->pet_owner_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST">
                                                                    <div class="modal-body text-center text-danger">
                                                                        <h4>Delete?</h4>
                                                                        <br>
                                                                        <!-- Hide This -->
                                                                        <input type="hidden" name="login_id" value="<?php echo $adopter->login_id; ?>">
                                                                        <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                        <input type="submit" name="Delete_Pet_Adopters" value="Delete" class="text-center btn btn-danger">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require_once('../partials/footer.php'); ?>

    </div>
    <!-- ./wrapper -->

    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>