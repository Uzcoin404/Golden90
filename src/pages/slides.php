<?php
$db = new Database();
$slides = $db->getSlides();
$slidesLength = count($slides) - 1;
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
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="">Slides</h5>
                        <a href="/admin/slides/create" class="btn btn-primary">Add new</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">image</th>
                                    <th scope="col">image 2</th>
                                    <th scope="col">position</th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($slides as $i => $slide) : ?>
                                    <tr>
                                        <th scope="row"><?= $i + 1 ?></th>
                                        <td><?= $slide['name'] ?? null ?></td>
                                        <td><img src="<?= $slide['picture'] ?>" alt="" class="table_image"></td>
                                        <td><img src="<?= $slide['picture_mobile'] ?>" alt="" class="table_image"></td>
                                        <td>
                                            <?php if ($i != 0) : ?>
                                                <a href="/src/components/slide-position.php?d=up&p=<?= $i + 1 . "&id=" . $slide['id'] ?>" type="button" class="btn btn-square btn-outline-secondary"><i class="fa-solid fa-arrow-up"></i></a>
                                            <?php endif ?>
                                            <?php if ($i != $slidesLength) : ?>
                                                <a href="/src/components/slide-position.php?d=down&p=<?= $i + 1 . "&id=" . $slide['id'] ?>" type="button" class="btn btn-square btn-outline-secondary"><i class="fa-solid fa-arrow-down"></i></a>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <a href="/admin/slides/edit/<?= $slide['id'] ?>" type="button" class="btn btn-square btn-success me-2"><i class="fa-solid fa-pen"></i></a>
                                            <a href="/src/components/slide-delete.php?id=<?= $slide['id'] ?>" type="button" class="btn btn-square btn-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('src/components/footer.php'); ?>
</body>

</html>