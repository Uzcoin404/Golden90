<?php

$db = new Database();
$name = $_POST['name'];
$target_dir = "slides/";
$target_file = $target_dir . basename($_FILES["picture"]["name"]);
var_dump($target_file);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-6">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Horizontal Form</h6>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row mb-4">
                    <label for="input1" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input1" name="name" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="formFile" class="form-label">Upload Picture</label>
                    <input class="form-control" type="file" id="formFile" name="picture" accept="image/png, image/gif, image/jpeg" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>