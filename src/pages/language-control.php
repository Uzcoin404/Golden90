<?php
$db = new Database();
$isEdit = $id ?? null;
if ($isEdit) {
    $selectedLang = $db->getLanguage($id);
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
                        <h5 class="mb-4"><?= !$isEdit ? "Add new Language" : "Edit Language" ?></h5>
                        <form action="/src/components/language-action.php" method="POST" enctype="multipart/form-data">
                            <div class="row mb-4">
                                <label for="input1" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input1" name="name" <?= !$isEdit ? 'required' : '' ?> value="<?= !$isEdit ? '' : $selectedLang['name']  ?>" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="input3" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="input3" name="status">
                                        <option value="1" <?= $isEdit && $selectedLang['status'] == '1' ? 'selected' : '' ?>>Visible</option>
                                        <option value="0" <?= $isEdit && $selectedLang['status'] == '0' ? 'selected' : '' ?>>Hidden</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="input2" class="form-label">Short name must be 2 letters and <strong>Unique</strong></label>
                                <input type="text" class="form-control" id="input2" name="keyword" value="<?= !$isEdit ? '' : $selectedLang['keyword'] ?>" <?= !$isEdit ? 'required' : '' ?>>
                            </div>
                            <div class="row mb-4">
                                <label for="formFile" class="col-sm-3 col-form-label">Upload icon</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="formFile" name="icon" accept="image/png, image/gif, image/jpeg" <?= !$isEdit ? 'required' : '' ?>>
                                </div>
                                <?php if ($isEdit) : ?>
                                    <input type="hidden" name="language" value='<?= json_encode($selectedLang) ?>'>
                                <?php endif ?>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit"><?= !$isEdit ? 'Submit' : 'Save' ?></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require('src/components/footer.php'); ?>
</body>

</html>