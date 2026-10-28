<?php
require_once 'db.php';

// Prüfen, ob das Formular abgeschickt wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Notiz aus dem Formular auslesen
    $content = trim($_POST['note'] ?? '');

    // Prüfen, ob die Notiz nicht leer ist
    if ($content !== '') {

        // Neue Notiz in die Datenbank einfügen
        $sql = "INSERT INTO notes (content) VALUES (:content)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'content' => $content
        ]);
    }
}

// Zurück zum TaskManager
header('Location: index.php');
exit;
