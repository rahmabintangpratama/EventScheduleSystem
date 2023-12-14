<nav class="navbar navbar-expand navbar-dark bg-primary sticky-top">
    <div class="container-lg">
        <a class="navbar-brand" href="."><i class="bi bi-calendar3"></i> Event Schedule System</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php if (empty($_SESSION['user_id'])) { ?>
                    <li class="nav-item">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalLogin">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Log In</button>
                    </li>
                <?php } ?>
                <?php if (!empty($_SESSION['user_id'])) { ?>
                    <li class="nav-item">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalLogout">
                            <i class="bi bi-box-arrow-right"></i> Log Out
                        </button>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal Login -->
<div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="process/login_process.php" method="POST"
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Masukkan Email"
                                    name="email" required>
                                <label for="floatingInput">Email</label>
                                <div class="invalid-feedback">
                                    Enter Email.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput"
                                    placeholder="Masukkan Password" name="password" required>
                                <label for="floatingInput">Password</label>
                                <div class="invalid-feedback">
                                    Enter Password.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="login_validate" value="12345">Log
                            In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal Login -->

<!-- Modal Logout -->
<div class="modal fade" id="ModalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to
                    <b>Log Out</b>?
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="process/logout_process.php" method="POST"
                    enctype="multipart/form-data">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger" name="login_validate" value="12345">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal Logout -->