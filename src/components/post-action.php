<?php
include_once('./db.php');
$db = new Database();
$langId = $_GET['lang'] ?? null;
$secId = $_GET['sec'] ?? null;

if (isset($_POST["submit"]) && $langId) {

    $post = isset($_POST['post']) ? json_decode($_POST['post'], true) : null;
    $text = $_POST['text'];
    $section = $_POST['section'] ?? $post['section'];
    $link = $_POST['link'] ?? $post['link'];
    $target_file = basename($_FILES["icon"]["name"]);
    $target_file2 = basename($_FILES["icon2"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

    $tmpName = $_FILES["icon"]["tmp_name"];
    $tmpName2 = $_FILES["icon2"]["tmp_name"];

    $uniqid = uniqid($section ? $section . '_' : '');
    $uniqid2 = str_replace('slides_', 'slides2_', $uniqid);
    $newFilePath = "../../public/img/pic/$uniqid.$imageFileType";
    $newFilePath2 = "../../public/img/pic/$uniqid2.$imageFileType2";

    $iconUrl = substr($newFilePath, 5, strlen($newFilePath));
    $iconUrl2 = substr($newFilePath2, 5, strlen($newFilePath2));
    $firstPic = $target_file != '';
    $secondPic = $target_file2 != '';
    if ($post) {
        if ($firstPic && $secondPic) {
            move_uploaded_file($tmpName, $newFilePath);
            move_uploaded_file($tmpName2, $newFilePath2);
        } else if ($firstPic) {
            move_uploaded_file($tmpName, $newFilePath);
        } else {
            move_uploaded_file($tmpName2, $newFilePath2);
        }
        var_dump($_FILES["icon2"]["name"]);
        $db->editPost($post, $langId, $text, $link, $firstPic ? $iconUrl : null, $secondPic ? $iconUrl2 : null);
    } else {
        $check = getimagesize($tmpName);
        if ($check !== false && $target_file != '') {
            move_uploaded_file($tmpName, $newFilePath);
            if ($secondPic) {
                move_uploaded_file($tmpName2, $newFilePath2);
            }
            $db->setPost($section, $langId, $text, $link, $iconUrl, $secondPic ? $iconUrl2 : null);
        }
    }
}
if ($secId) {
    header("Location: /admin/items/$secId/$langId");
    exit();
}
header("Location: /admin/sections/$langId");
exit();