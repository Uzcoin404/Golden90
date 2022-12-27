<?php
include_once('./db.php');
$db = new Database();
$id = $_GET['id'] ?? null;
if ($id) {
    $db->deleteSlide($id);
}
header("Location: /admin/slides");