<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-toggle="modal" href="#logout_modal">
                <i class="fas fa-user-tag"></i>
            </a>
        </li>
    </ul>
</nav>

<!-- Logout Modal -->
<div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="logout">
                <div class="modal-body text-center text-danger">
                    <img src="../public/img/logo.png" style="width: 40%;">
                    <h4>Terminate Session?</h4>
                    <br>
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <input type="submit" value="Yes, Logout" class="text-center btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->