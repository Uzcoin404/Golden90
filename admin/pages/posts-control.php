<?php
$db = new Database();
if ($postId) {
    $post = $db->getPost($postId);
    print_r($post);
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-6">
        <div class="bg-light rounded h-100 p-4">
            <h5 class="mb-4"><?= !$postId ? "Add new Post" : "Edit Post" ?></h5>
            <form action="/admin/components/post-action.php?lang=<?= $langId ?>" method="POST" enctype="multipart/form-data">
                <div class="row mb-4">
                    <label for="input1" class="col-sm-2 col-form-label">Text</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="input1" name="text"><?= !$postId ? '' : $post[$langId] ?></textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="input2" class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input2" name="link" value="<?= !$postId ? '' : $post['link'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="formFile" class="col-sm-3 col-form-label">Upload icon</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" id="formFile" name="icon" accept="image/png, image/gif, image/jpeg" <?= !$postId ? 'required' : '' ?>>
                    </div>
                    <?php if (isset($postId)) : ?>
                        <input type="hidden" name="post" value='<?= json_encode($post) ?>'>
                    <?php endif ?>
                </div>
                <button type="submit" class="btn btn-primary" name="submit"><?= !$postId ? 'Submit' : 'Save' ?></button>
            </form>
        </div>
    </div>
</div>