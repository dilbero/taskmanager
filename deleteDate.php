<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = trim($_POST['id'] ?? '');

    if (
        $id !== ''
    ) {

        $query = "
            DELETE FROM calendar WHERE id = :id
        ";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            'id' => $id
        ]);
    }
}

header('Location: index.php');
exit;