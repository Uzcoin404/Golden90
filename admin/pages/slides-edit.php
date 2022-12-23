<?php

$db = new Database();
$destination_path = getcwd() . DIRECTORY_SEPARATOR;

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $target_file = basename($_FILES["picture"]["name"]);
    $target_file_mob = basename($_FILES["picture_mobile"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imageFileType_mob = strtolower(pathinfo($target_file_mob, PATHINFO_EXTENSION));

    $tmpName = $_FILES["picture"]["tmp_name"];
    $tmpName_mob = $_FILES["picture_mobile"]["tmp_name"];
    $check = getimagesize($tmpName) && getimagesize($tmpName_mob);

    if ($check !== false) {
        $newFilePath = "../img/slides/" . uniqid("slide_", false) . ".$imageFileType";
        $newFilePath_mob = str_replace('slide_', 'slide_mob_', $newFilePath);

        move_uploaded_file($tmpName, $newFilePath);
        move_uploaded_file($tmpName_mob, $newFilePath_mob);
        $db->setSlide($name, $newFilePath, $newFilePath_mob);
    }
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-6">
        <div class="bg-light rounded h-100 p-4">
            <h5 class="mb-4">Add new Slide</h5>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row mb-4">
                    <label for="input1" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input1" name="name" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="formFile" class="col-sm-3 col-form-label">Upload Picture</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" id="formFile" name="picture" accept="image/png, image/gif, image/jpeg" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="formFile" class="col-sm-3 col-form-label">Upload mobile Picture</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" id="formFile" name="picture_mobile" accept="image/png, image/gif, image/jpeg" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>