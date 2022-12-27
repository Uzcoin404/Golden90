<?php
include_once('./db.php');
$db = new Database();
var_dump($_POST);
if (isset($_POST["submit"])) {

    $name = $_POST['name'];
    $target_file = basename($_FILES["picture"]["name"]);
    $target_file_mob = basename($_FILES["picture_mobile"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imageFileType_mob = strtolower(pathinfo($target_file_mob, PATHINFO_EXTENSION));

    $tmpName = $_FILES["picture"]["tmp_name"];
    $tmpName_mob = $_FILES["picture_mobile"]["tmp_name"];
    $slide = $_POST['slide'] ? json_decode($_POST['slide']) : null;

    if (!$slide || ($target_file != '' && $target_file_mob != '')) {
        $check = getimagesize($tmpName) && getimagesize($tmpName_mob);
        if ($check !== false) {
            $newFilePath = "../img/slides/" . uniqid("slide_", false) . ".$imageFileType";
            $newFilePath_mob = str_replace('slide_', 'slide_mob_', $newFilePath);

            move_uploaded_file($tmpName, $newFilePath);
            move_uploaded_file($tmpName_mob, $newFilePath_mob);
        }
        if ($action == 'add') {
            $db->setSlide($name, $newFilePath, $newFilePath_mob);
        } else {
            $db->editSlide(json_decode($_POST['slide'])->id, $name, $newFilePath, $newFilePath_mob);
        }
    } else if ($slide) {
        if ($target_file != '' && $target_file_mob == '') {

            $newFilePath = "../img/slides/" . uniqid("slide_", false) . ".$imageFileType";

            move_uploaded_file($tmpName, $newFilePath);
            $db->editSlide($slide->id, $name, $newFilePath, $slide->picture_mobile);
        } else if ($target_file == '' && $target_file_mob != '') {

            $newFilePath_mob = "../img/slides/" . uniqid("slide_mob_", false) . ".$imageFileType_mob";

            move_uploaded_file($tmpName_mob, $newFilePath_mob);
            $db->editSlide($slide->id, $name, $slide->picture, $newFilePath_mob);
        } else {
            $db->editSlide($slide->id, $name, $slide->picture, $slide->picture_mobile);
        }
    }
}
header("Location: /admin/slides");
exit();