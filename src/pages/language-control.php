<?php
$db = new Database();
$isEdit = $id ?? null;
if ($isEdit) {
    $language = $db->getLanguage($id);
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-6">
        <div class="bg-light rounded h-100 p-4">
            <h5 class="mb-4"><?= !$isEdit ? "Add new Post" : "Edit Post" ?></h5>
            <form action="/src/components/language-action.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-4">
                    <label for="input1" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="input1" name="name" <?= !$isEdit ? 'required' : '' ?>><?= !$isEdit ? '' : $language['name']  ?></textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="input2" class="form-label">Short name must be 2 letters and <strong>Unique</strong></label>
                    <input type="text" class="form-control" id="input2" name="keyword" value="<?= !$isEdit ? '' : $language['keyword'] ?>" <?= !$isEdit ? 'required' : '' ?>>
                </div>
                <div class="row mb-4">
                    <label for="formFile" class="col-sm-3 col-form-label">Upload icon</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" id="formFile" name="icon" accept="image/png, image/gif, image/jpeg" <?= !$isEdit ? 'required' : '' ?>>
                    </div>
                    <?php if ($isEdit) : ?>
                        <input type="hidden" name="language" value='<?= json_encode($language) ?>'>
                    <?php endif ?>
                </div>
                <button type="submit" class="btn btn-primary" name="submit"><?= !$isEdit ? 'Submit' : 'Save' ?></button>
            </form>
        </div>
    </div>
</div>