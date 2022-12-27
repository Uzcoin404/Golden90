<?php
include_once('./db.php');
$db = new Database();
$id = $_GET['id'] ?? null;
$langId = $_GET['lang'];

if ($id) {
    $db->deletePost($id);
}
header("Location: /admin/posts/$langId");