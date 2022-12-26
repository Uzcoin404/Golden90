<?php
include_once('./db.php');
$db = new Database();
$langId = $_GET['lang'] ?? null;

if (isset($_POST["submit"])) {

    $post = $_POST['post'] ? json_decode($_POST['post']) : null;
    $text = $_POST['text'];
    $link = $_POST['link'] ?? $post->link;
    $target_file = basename($_FILES["icon"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $tmpName = $_FILES["icon"]["tmp_name"];
    if ($post) {
        var_dump($post  );
        if ($target_file != '') {

            $newFilePath = "../img/icons/" . uniqid("icon_", false) . ".$imageFileType";

            move_uploaded_file($tmpName, $newFilePath);
            $db->editPost($post->id, $langId, $text, $link, $newFilePath);
        } else {
            var_dump($post->id, $langId, $text, $link, $post->icon);
            var_dump($db->editPost($post->id, $langId, $text, $link, $post->icon));
        }
    } else {
        // $check = getimagesize($tmpName);
        // if ($check !== false) {
        //     $newFilePath = "../img/icons/" . uniqid("icon_", false) . ".$imageFileType";

        //     move_uploaded_file($tmpName, $newFilePath);
        // }
        // $db->setSlide($name, $newFilePath, $newFilePath_mob);
    }
}
// header("Location: /admin/posts/$langId");
