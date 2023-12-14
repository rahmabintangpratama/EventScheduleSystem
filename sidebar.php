<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel" style="width:250px">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><i class="bi bi-calendar3"></i>
                        Event Schedule System</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                        <?php if (empty($_SESSION['user_id'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'guestpage') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark' ?>"
                                    aria-current="page" href="guestpage">
                                    <i class="bi bi-house-door"></i> Dashboard
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['user_id'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'administratorpage') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark' ?>"
                                    aria-current="page" href="administratorpage">
                                    <i class="bi bi-house-door"></i> Dashboard
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['user_id'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'active link-light' : 'link-dark' ?>"
                                    aria-current="page" href="user">
                                    <i class="bi bi-person-gear"></i></i> User
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (empty($_SESSION['user_id'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'contact') ? 'active link-light' : 'link-dark' ?>"
                                    aria-current="page" href="contact">
                                    <i class="bi bi-telephone"></i></i></i> Contact Person
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'about')) ? 'active link-light' : 'link-dark' ?>"
                                aria-current="page" href="about">
                                <i class="bi bi-exclamation-circle"></i> About
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>