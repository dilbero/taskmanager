let containerNewCalenderItem = document.getElementById("containerNewCalenderItem");
let containerNewTask = document.getElementById("containerNewTask");
let containerNewNote = document.getElementById("containerNewNote");
let labelWeekday = document.getElementById("labelWeekday");
let labelToday = document.getElementById("labelToday");
let inputTask = document.getElementById("taskTitle");
let inputNote = document.getElementById("note");

document.addEventListener("DOMContentLoaded", function () {
    containerNewCalenderItem.style.display = "none";
    containerNewTask.style.display = "none";
    containerNewNote.style.display = "none";
    getTodaysDate();
});

function newCalenderItem() {
if (containerNewCalenderItem.style.display === "none") {
        containerNewCalenderItem.style.display = "block";
    } else {
        containerNewCalenderItem.style.display = "none";
    }
}

function newTask() {
    if (containerNewTask.style.display === "none") {
        containerNewTask.style.display = "block";
        inputTask.focus();
    } else {
        containerNewTask.style.display = "none";
    }
}

function newNote() {
    if (containerNewNote.style.display === "none") {
        containerNewNote.style.display = "block";
        inputNote.focus();
    } else {
        containerNewNote.style.display = "none";
    }
}

function getTodaysDate() {
    const today = new Date();

    labelWeekday.textContent = today.toLocaleDateString("de-DE", {
        weekday: "short"
    }).replace(".", "");

    labelToday.textContent = today.toLocaleDateString("de-DE", {
        day: "2-digit",
        month: "2-digit",
        year: "numeric"
    }).replace(",", "");
}