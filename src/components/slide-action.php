<?php
include_once('./db.php');
$db = new Database();
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
            $newFilePath = "../../public/img/slides/" . uniqid("slide_", false) . ".$imageFileType";
            $newFilePath_mob = str_replace('slide_', 'slide_mob_', $newFilePath);

            $picUrl = substr($newFilePath, 5, strlen($newFilePath));
            $picUrl_mob = substr($newFilePath_mob, 5, strlen($newFilePath_mob));

            move_uploaded_file($tmpName, $newFilePath);
            move_uploaded_file($tmpName_mob, $newFilePath_mob);
        }
        if (!$slide) {
            $db->setSlide($name, $picUrl, $picUrl_mob);
        } else {
            $db->editSlide($slide->id, $name, $picUrl, $picUrl_mob);
        }
    } else if ($slide) {
        if ($target_file != '' && $target_file_mob == '') {

            $newFilePath = "../../public/img/slides/" . uniqid("slide_", false) . ".$imageFileType";
            $picUrl = substr($newFilePath, 5, strlen($newFilePath));

            move_uploaded_file($tmpName, $newFilePath);
            $db->editSlide($slide->id, $name, $picUrl, $slide->picture_mobile);
        } else if ($target_file == '' && $target_file_mob != '') {

            $newFilePath_mob = "../../public/img/slides/" . uniqid("slide_mob_", false) . ".$imageFileType_mob";
            $picUrl = substr($newFilePath_mob, 5, strlen($newFilePath_mob));

            move_uploaded_file($tmpName_mob, $newFilePath_mob);
            $db->editSlide($slide->id, $name, $slide->picture, $picUrl_mob);
        } else {
            $db->editSlide($slide->id, $name, $slide->picture, $slide->picture_mobile);
        }
    }
}
header("Location: /admin/slides");
exit();