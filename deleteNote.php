<?php
require_once 'db.php';

// Prüfen, ob das Formular abgeschickt wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ID der Notiz auslesen
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    // Prüfen, ob eine gültige ID vorhanden ist
    if ($id !== false && $id !== null && $id > 0) {

        // Notiz aus der Datenbank löschen
        $sql = "DELETE FROM notes WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);
    }
}

// Zurück zum TaskManager
header('Location: index.php');
exit;
