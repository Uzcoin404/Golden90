<?php
include_once('./db.php');
$db = new Database();
$id = $_GET['id'] ?? null;
$langId = $_GET['lang'];
$sectionId = $_GET['sec'];

if ($id) {
    $db->deletePost($id);
}
header("Location: /admin/items/$sectionId/$langId");
exit();