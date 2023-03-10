<?php
$db = new Database();
if ($slideId) {
    $slide = $db->getSlide($slideId);
}
require('src/components/header.php');
include_once('src/components/spinner.php');
?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php include_once('src/components/sidebar.php'); ?>
        <div class="content">

            <?php require('src/components/nav.php'); ?>

            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h5 class="mb-4"><?= !$slideId ? "Add new Slide" : "Edit Slide" ?></h5>
                        <form action="/src/components/slide-action.php" method="POST" enctype="multipart/form-data">
                            <div class="row mb-4">
                                <label for="input1" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input1" name="name" required value="<?= !$slideId ? '' : $slide['name'] ?>">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="formFile" class="col-sm-3 col-form-label">Upload Picture</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="formFile" name="picture" accept="image/png, image/gif, image/jpeg" <?= !$slideId ? 'required' : '' ?>>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="formFile" class="col-sm-3 col-form-label">Upload mobile Picture</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="formFile" name="picture_mobile" accept="image/png, image/gif, image/jpeg" <?= !$slideId ? 'required' : '' ?>>
                                </div>
                                <input type="hidden" name="slide" value='<?= json_encode($slide) ?>'>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit"><?= !$slideId ? 'Submit' : 'Save' ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('src/components/footer.php'); ?>
</body>

</html>