<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['taskTitle'] ?? '');

    if ($title !== '') {

        $sql = "INSERT INTO tasks (title, completed)
                VALUES (:title, :completed)";

        $query = $pdo->prepare($sql);

        $query->execute([
            'title' => $title,
            'completed' => 0
        ]);
    }
}

header('Location: index.php');
exit;