
<?php

// Speicherort der Datenbank
$dbDirectory = __DIR__ . '/database';
$dbFile = $dbDirectory . '/tasks.db';

// Datenbankordner erstellen, falls er fehlt
if (!is_dir($dbDirectory)) {
    mkdir($dbDirectory, 0755, true);
}

try {
    // Verbindung zur SQLite-Datenbank herstellen
    $pdo = new PDO('sqlite:' . $dbFile);

    // Fehlermeldungen als Exceptions ausgeben
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ergebnisse als assoziative Arrays zurückgeben
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Tabelle erstellen, falls sie noch nicht existiert
    $sql = "
        CREATE TABLE IF NOT EXISTS tasks (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            is_done INTEGER NOT NULL DEFAULT 0
        )
    ";

    $pdo->exec($sql);

} catch (PDOException $e) {
    // Keine technischen Details an Besucher ausgeben
    error_log('Datenbankfehler: ' . $e->getMessage());

    http_response_code(500);
    exit('Die Datenbank ist momentan nicht verfügbar.');
}
