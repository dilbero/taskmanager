<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $content = trim($_POST['note'] ?? '');

    if ($content !== '') {

        $sql = "INSERT INTO notes (content) VALUES (:content)";
        $query = $pdo->prepare($sql);

        $query->execute([
            'content' => $content
        ]);
    }
}

header('Location: index.php');
exit;
