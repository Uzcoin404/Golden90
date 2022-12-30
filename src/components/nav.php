<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="/src/img/user.png" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex"><?= $user['name'] ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="/src/components/logout.php" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>