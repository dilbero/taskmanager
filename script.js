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

function createOptions(container, count, step, type) {
    for (let i = 0; i < count; i += step) {
        const value = String(i).padStart(2, "0");
        const option = document.createElement("div");

        option.className = "time-option";
        option.textContent = value;

        if ((type === "hour" ? hour : minute) === value) {
            option.classList.add("selected");
        }

        option.addEventListener("click", () => {
            if (type === "hour") {
                hour = value;
            } else {
                minute = value;
            }

            updateTime();
        });

        container.appendChild(option);
    }
}

function updateTime() {
    selectedTime.textContent = `${hour}:${minute}`;
    timeInput.value = `${hour}:${minute}`;

    hours.innerHTML = "";
    minutes.innerHTML = "";

    createOptions(hours, 24, 1, "hour");
    createOptions(minutes, 60, 5, "minute");
}

timeButton.addEventListener("click", () => {
    timeMenu.classList.toggle("open");
});

document.addEventListener("click", (event) => {
    if (!event.target.closest(".time-picker")) {
        timeMenu.classList.remove("open");
    }
});

updateTime();