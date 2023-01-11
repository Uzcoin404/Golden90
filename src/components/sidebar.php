<?php
$db = new Database();
$user = $db->getUser($_COOKIE['email']);
$languages = $db->getLanguages();
$sections = $db->getSections();
?>

<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Golden90</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="/src/img/user.png" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?= $user['name'] ?></h6>
                <span><?= $user['email'] ?></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/admin" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Posts</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <?php foreach ($languages as $i => $language) : ?>
                        <a href="/admin/sections/<?= $language['keyword'] ?>" class="dropdown-item">
                            <img src="<?= $language['icon'] ?>" alt="" class="flag__icon">
                            <?= $language['name'] ?>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Sections</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="/admin/items/<?= isset($langId) ? $langId : 'tr' ?>" class="dropdown-item">
                        No section
                    </a>
                    <?php foreach ($sections as $i => $section) : ?>
                        <a href="/admin/items/<?= $section['keyword'] ?>/<?= isset($langId) ? $langId : 'tr' ?>" class="dropdown-item">
                            <?= $section['name'] ?>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>
            <a href="/admin/languages" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Languages</a>
        </div>
    </nav>
</div>