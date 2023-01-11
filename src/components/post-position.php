<?php
include_once('./db.php');
$db = new Database();

$position = $_GET['p'] ?? null;
$direction = $_GET['d'] ?? null;
$id = $_GET['id'] ?? null;
$langId = $_GET['lang'];
$sectionId = $_GET['sec'];

if ($position && $direction && $id) {
    $db->postPosititon($id, $position, $direction, $sectionId);
}
header("Location: /admin/items/$sectionId/$langId");
exit();