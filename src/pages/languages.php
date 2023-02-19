<?php
$db = new Database();
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
                        <h5 class="">Languages</h5>
                        <a href="/admin/language/create" class="btn btn-primary">Add new</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($languages as $i => $language) : ?>
                                    <tr>
                                        <th scope="row"><?= $i + 1 ?></th>
                                        <td><?= $language['name'] ?></td>
                                        <td><?= $language['status'] ? 'Visible' : 'Hidden' ?></td>
                                        <td>
                                            <img src="<?= '../' . $language['icon'] ?>" alt="" class="flag__icon">
                                        </td>
                                        <td>
                                            <a href="/admin/language/edit/<?= $language['id'] ?>" type="button" class="btn btn-square btn-success me-2">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="/src/components/language-delete.php?id=<?= $language['keyword'] ?>" type="button" class="btn btn-square btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
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