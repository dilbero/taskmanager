<?php
require_once 'db.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$completed = isset($_POST['completed']) ? 1 : 0;

if ($id !== false && $id !== null && $id > 0) {
    $sql = "UPDATE tasks SET completed = :completed WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'completed' => $completed,
        'id' => $id
    ]);
}

header('Location: index.php');
exit;