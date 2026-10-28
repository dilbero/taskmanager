let containerNewTask = document.getElementById("containerNewTask");
let containerNewNote = document.getElementById("containerNewNote");

document.addEventListener("DOMContentLoaded", function () {
    containerNewTask.style.display = "none";
    containerNewNote.style.display = "none";
});

function newTask() {
    if (containerNewTask.style.display === "none") {
        containerNewTask.style.display = "block";
    } else {
        containerNewTask.style.display = "none";
    }
}

function newNote() {
    if (containerNewNote.style.display === "none") {
        containerNewNote.style.display = "block";
    } else {
        containerNewNote.style.display = "none";
    }
}