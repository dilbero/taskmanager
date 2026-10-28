<?php
require_once 'db.php';
$sql_query = "SELECT * FROM tasks";
$stmt = $pdo->query($sql_query);
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
$sql_query = "SELECT * FROM notes";
$stmt = $pdo->query($sql_query);
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link rel="stylesheet" href="stylesheet.css">
    <script src="script.js" defer></script>
</head>
<body>
    <main class="mainContent">
        <section class="card">
            <h1>TimeTable</h1>
            <div class="container">
                <h2><u>Deine Termine</u></h2>
            </div>
            <div class="container">
                <h2>Neuen Termin erstellen</h2>
            </div>
        </section>
        <section class="card">
            <h1>TaskManager</h1>
            <div class="container">
                <h2><u>Deine Aufgaben</u></h2> 
                <?php
                    if (empty($tasks)) {
                        echo "<div class='emptyList'>
                              <div class='checkmark'>✓</div>
                              <h3>Alles erledigt, du hast keine Aufgaben!</h3>
                              </div>";
                    } else {
                        foreach ($tasks as $task) {
                    echo "<div class='taskList'>";
                    
                    echo "<form method='POST' action='changeTaskState.php'>";
                    echo "<input type='hidden' name='id' value='" . (int)$task['id'] . "'>";
                    echo "<input type='checkbox' name='completed' value='1' "
                        . ($task['completed'] ? 'checked' : '')
                        . " onchange='this.form.submit()'>";
                    echo "</form>";
                    echo "<div class='taskName'>";
                    echo "<span>".($task['title'])."</span>";
                    echo "</div>";
                    echo "<form method='POST' action='deleteTask.php'>";
                    echo "<input type='hidden' name='id' value='" . (int)$task['id'] . "'>";
                    echo "<button type='submit' class='deleteButton' onclick='return confirm(\"Möchtest du diesen Task wirklich löschen?\")'>X</button>";
                    echo "</form>";
                    echo "</div>";
}
                    }
                ?>
            </div>
            <button class="buttonExtend" onclick="newTask()">Neue Aufgabe</button>
            <div id="containerNewTask" class="container">
                <h2>Neue Aufgabe</h2>
                <form method="POST" action="addTask.php" id="addForm" class="addTaskForm">
                    <input type="text" id="title" name="taskTitle" class="addInput" placeholder="Was möchtest du erledigen?" maxlength="150" required>
                    <button type="submit" class="buttonAdd">
                        + Hinzufügen
                    </button>
                </form>
            </div>            
        </section>
        <section class="card">
            <h1>StickyNotes</h1>
            <div class="container">
                <h2>Deine Notizen</h2>
                <?php
                    if (empty($notes)) {
                        echo "<div class='emptyList'>
                              <h3>Du hast noch keine Notizen!</h3>
                              </div>";
                    } else {
                        foreach ($notes as $note) {
                    echo "<div class='taskList'>";
                    
                    
                    
                    
                    echo "<form method='POST' action='deleteNote.php'>";
                    echo "<input type='hidden' name='id' value='" . (int)$note['id'] . "'>";
                    echo "<button type='submit' class='deleteButton' onclick='return confirm(\"Möchtest du diesen Task wirklich löschen?\")'>";
                    echo "<div class='sticky-note'>";
                    echo "<span>".($note['content'])."</span>";
                    echo "</div>";
                    echo "</button>";
                    echo "</form>";
                    
                    echo "</div>";
}
                    }
                ?>
            </div>
            <button class="buttonExtend" onclick="newNote()">Neue Notiz</button>
            <div id="containerNewNote" class="noteAddContainer">
                <hr>
                <form method="POST" action="addNote.php" id="addNoteForm" class="addNoteForm">
                    <div class="sticky-note">
                        <textarea id="note" name="note" rows="5" cols="40" placeholder="Was willst du notieren?" maxlength="500" required></textarea>
                    </div>
                    <button type="submit" class="buttonAdd">+ Hinzufügen</button>
                </form>
            </div>            
        </section>
    </main>          
</body>
</html>
