<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Golden90</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="/admin/slides" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Slides</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Posts</a>
                <div class="dropdown-menu bg-transparent border-0 show">
                    <?php foreach ($languages as $i => $language) : ?>
                        <a href="/admin/posts/<?= $language['keyword'] ?>" class="dropdown-item <?= $language['keyword'] == $langId ? 'active' : '' ?>">
                            <img src="<?= $language['icon'] ?>" alt="" class="flag__icon">
                            <?= $language['name'] ?>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>
            <a href="/admin/languages" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Languages</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Blank Page</a>
                </div>
            </div>
        </div>
    </nav>
</div>