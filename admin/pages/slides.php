<?php
$db = new Database();
$slides = $db->getSlides();
?>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="">Slides</h5>
            <a href="/admin/slides/add" class="btn btn-primary">Add new</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">image</th>
                        <th scope="col">position</th>
                        <th scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($slides as $i => $slide) : ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $slide['name'] ?></td>
                            <td><img src="<?= '../' . $slide['picture'] ?>" alt="" class="table_image"></td>
                            <td>
                                <button type="button" class="btn btn-square btn-outline-secondary"><i class="fa-solid fa-arrow-up"></i></button>
                                <button type="button" class="btn btn-square btn-outline-secondary"><i class="fa-solid fa-arrow-down"></i></button>
                            </td>
                            <td>
                                <a href="/admin/slides/add?edit=1" type="button" class="btn btn-square btn-success me-2"><i class="fa-solid fa-pen"></i></a>
                                <a type="button" class="btn btn-square btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>