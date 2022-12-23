<?php
include_once('./db.php');
$db = new Database();

$slidePosition = isset($_GET['slide_pos']);
$direction = isset($_GET['direction']);
if ($slidePosition && $direction) {
    $db->slideUp($slidePosition, $direction);
}
?>