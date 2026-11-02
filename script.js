const timeButton = document.getElementById("timeButton");
const timeMenu = document.getElementById("timeMenu");
const hours = document.getElementById("hours");
const minutes = document.getElementById("minutes");
const selectedTime = document.getElementById("selectedTime");
const timeInput = document.getElementById("timeInput");

let hour = "14";
let minute = "30";
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
        document.getElementById("dateArrow").classList.add("open");
    } else {
        containerNewCalenderItem.style.display = "none";
        document.getElementById("dateArrow").classList.remove("open");
    }
}

function newTask() {
    if (containerNewTask.style.display === "none") {
        containerNewTask.style.display = "block";
        inputTask.focus();
        document.getElementById("taskArrow").classList.add("open");
    } else {
        containerNewTask.style.display = "none";
        document.getElementById("taskArrow").classList.remove("open");
    }
}

function newNote() {
    if (containerNewNote.style.display === "none") {
        containerNewNote.style.display = "block";
        inputNote.focus();
        document.getElementById("noteArrow").classList.add("open");
    } else {
        containerNewNote.style.display = "none";
        document.getElementById("noteArrow").classList.remove("open");
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

function timeChanged() {
    const pickerStart = document.getElementById("startTime"); 
    const pickerEnd = document.getElementById("endTime");

    pickerEnd.disabled = false;

      if (!pickerStart.value) return;

    const [hours, minutes] = pickerStart.value.split(":").map(Number);

    const nextHour = (hours + 1) % 24;

    pickerEnd.value =
        String(nextHour).padStart(2, "0") + ":" +
        String(minutes).padStart(2, "0");
}