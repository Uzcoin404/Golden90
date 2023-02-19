<?php
include_once('./db.php');
$db = new Database();

if (isset($_POST["submit"])) {

    $language = $_POST['language'] ? json_decode($_POST['language']) : null;
    $name = $_POST['name'];
    $keyword = $_POST['keyword'];
    $status = $_POST['status'];
    $target_file = basename($_FILES["icon"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $tmpName = $_FILES["icon"]["tmp_name"];
    $newFilePath = "../../public/img/flags/" . uniqid("flag_", false) . ".$imageFileType";
    $iconUrl = substr($newFilePath, 5, strlen($newFilePath));
    if ($language) {
        $editColumn = $language->keyword == $keyword ? null : $language->keyword;
        if ($target_file != '') {
            move_uploaded_file($tmpName, $newFilePath);
            $db->editLanguage($language->id, $editColumn, $name, $keyword, $status, $iconUrl);
        } else {
            $db->editLanguage($language->id, $editColumn, $name, $keyword, $status, $language->icon);
        }
    } else {
        $check = getimagesize($tmpName);
        if ($check !== false && $target_file != '') {

            move_uploaded_file($tmpName, $newFilePath);
            $db->setLanguage($name, $keyword, $status, $iconUrl);
        }
    }
}
if ($keyword) {
    header("Location: /admin/items/$keyword");
    exit;
} else {
    header("Location: /admin/languages");
    exit;
}
