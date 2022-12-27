<?php
include_once('./db.php');
$db = new Database();

$slidePosition = $_GET['p'] ?? null;
$direction = $_GET['d'] ?? null;
$id = $_GET['id'] ?? null;

if ($slidePosition && $direction && $id) {
    $db->slideUp($id, $slidePosition, $direction);
}
header("Location: /admin/slides");
exit();