<?php
require_once('../partials/head.php');
?>


<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h5 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                        Apartment Visitors Management System
                                        <hr>
                                        Reset Password
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" class="text-start">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" required name="admin_email" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="Reset_Password_Step_1" class="btn bg-gradient-primary w-100 my-4 mb-2">Reset</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Remember password?
                                        <a href="../" class="text-primary text-gradient font-weight-bold">Sign In</a>
                                    </p>
                                </form>
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