<?php
require_once 'db.php';

$sql_query = "SELECT * FROM tasks";

$stmt = $pdo->query($sql_query);


$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TaskManager</title>

    <link rel="stylesheet" href="stylesheet.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="card">

            <h1>TaskManager</h1>

            <div class="box">

                <h2>Deine Aufgaben</h2>
                
                <?php
                    if (empty($tasks)) {
                        echo "<div class='empty-icon'>✓</div>
                                <div class='checkmark' id='checkmark'>
                                    <h3>Alles erledigt!</h3>
                                    <p>Du hast noch keine Aufgaben. Füge deine erste hinzu.</p>
                                </div>
                            </div>";
                    } else {
                        foreach ($tasks as $task) {
                         echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8');
                        }
                    }
                ?>

            <div class="box">

                <h2>Neue Aufgabe</h2>

                <form method="POST" action="add.php" id="addForm">

                    <input type="text" id="title" name="title" class="addInput" placeholder="Was möchtest du erledigen?" maxlength="150" required>

                    <button type="submit" class="addButton">
                        + Hinzufügen
                    </button>

                </form>
            </div>
    </div>           
</body>
</html>
