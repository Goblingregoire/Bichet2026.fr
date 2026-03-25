<?php
session_start();
if (!isset($_SESSION['admin'])) exit;

require 'db.php';

if (isset($_FILES['image']) && isset($_POST['id'])) {
    $file = $_FILES['image'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = 'uploads/' . uniqid() . '.' . $ext;

    if (move_uploaded_file($file['tmp_name'], $filename)) {
        $stmt = $pdo->prepare("UPDATE content SET value=? WHERE identifier=?");
        $stmt->execute([$filename, $_POST['id']]);
    }
}
