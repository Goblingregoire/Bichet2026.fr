<?php
session_start();
if (!isset($_SESSION['admin'])) exit;

require 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$stmt = $pdo->prepare("UPDATE content SET value=? WHERE identifier=?");
$stmt->execute([$data['value'], $data['id']]);
