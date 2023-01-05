<?php
$db = new Database();
$sections = $db->getSections();
require('src/components/header.php');
include_once('src/components/spinner.php');
?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php include_once('src/components/sidebar.php'); ?>
        <div class="content">

            <?php require('src/components/nav.php'); ?>

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="row gy-4">
                        <div class="col-4">
                            <a href="/admin/items/<?= $langId ?>" class="card px-3 py-4">
                                <h5 class="card-title">No section</h5>
                                <p class="card-text">Buttons links and other items</p>
                            </a>
                        </div>
                        <?php foreach ($sections as $section) : ?>
                            <div class="col-4">
                                <a href="/admin/items/<?= $section['keyword'] . "/$langId" ?>" class="card px-3 py-4">
                                    <h5 class="card-title"><?= $section['name'] ?></h5>
                                    <p class="card-text"><?= $section['keyword'] ?></p>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('src/components/footer.php'); ?>
</body>

</html>