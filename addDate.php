<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['dateName'] ?? '');
    $startTime = trim($_POST['startTime'] ?? '');
    $endTime = trim($_POST['endTime'] ?? '');
    $eventDate = trim($_POST['eventDate'] ?? '');

    if (
        $title !== '' &&
        $$eventDate !== '' &&
        $startTime !== '' &&
        $endTime !== ''
    ) {

        $query = "
            INSERT INTO calendar (title, event_date, start_time, end_time)
            VALUES (:title, :eventDate, :start_time, :end_time)
        ";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            'title' => $title,
            'eventDate' => $eventDate,
            'start_time' => $startTime,
            'end_time' => $endTime
        ]);
    }
}

header('Location: index.php');
exit;