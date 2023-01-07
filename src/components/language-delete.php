<?php
include_once('./db.php');
$db = new Database();
$keyword = $_GET['id'] ?? null;

if ($keyword) {
    $db->deleteLanguage($keyword);
}
header("Location: /admin/languages");
exit();