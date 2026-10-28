<?php
require_once 'db.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id !== false && $id !== null && $id > 0) {
    $sql = "DELETE FROM tasks WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

header('Location: index.php');
exit;