<?php
require_once 'db.php';

// Prüfen, ob das Formular abgeschickt wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Titel aus dem Formular auslesen
    $title = trim($_POST['taskTitle'] ?? '');

    // Prüfen, ob ein Titel eingegeben wurde
    if ($title !== '') {

        // Task als unerledigt in die Datenbank einfügen
        $sql = "INSERT INTO tasks (title, completed)
                VALUES (:title, :completed)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'title' => $title,
            'completed' => 0
        ]);
    }
}

// Zurück zum TaskManager
header('Location: index.php');
exit;