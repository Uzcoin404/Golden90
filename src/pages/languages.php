<?php
$db = new Database();
$languages = $db->getLanguages();
?>

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
                        <th scope="col">short name</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($languages as $i => $language) : ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $language['name'] ?></td>
                            <td><?= $language['keyword'] ?></td>
                            <td>
                                <img src="<?= '../' . $language['icon'] ?>" alt="" class="flag__icon">
                            </td>
                            <td>
                                <a href="/admin/language/edit/<?= $language['id'] ?>" type="button" class="btn btn-square btn-success me-2">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="/src/components/slide-delete.php?id=<?= $language['id'] ?>" type="button" class="btn btn-square btn-danger">
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