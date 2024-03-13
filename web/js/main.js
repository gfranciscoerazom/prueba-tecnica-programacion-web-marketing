const toggleMenuIcon = document.querySelector("#toggle-menu-icon");
const mobileMenu = document.querySelector(".mobile-menu");
const mobileMenuAnchor = document.querySelectorAll(".mobile-menu a");

function toggleMobileMenu() {
    toggleMenuIcon.textContent =
        toggleMenuIcon.textContent.trim() === "menu" ? "close" : "menu";

    mobileMenu.classList.toggle("hide");
}

toggleMenuIcon.addEventListener("click", toggleMobileMenu);
mobileMenuAnchor.forEach((anchor) => {
    anchor.addEventListener("click", toggleMobileMenu);
});

const inputsText = document.querySelectorAll(".input-text");
inputsText.forEach((input) => {
    input.addEventListener("focus", () => {
        input.parentElement.querySelector("label").classList.remove("hide");
    });

    input.addEventListener("blur", () => {
        if (input.value === "") {
            input.parentElement.querySelector("label").classList.add("hide");
        }
    });
});

const eventDate = new Date("2024-05-16 10:00:00").getTime();
let countdown = setInterval(() => {
    let now = new Date().getTime();
    let distance = eventDate - now;

    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor(
        (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").textContent = days;
    document.getElementById("hours").textContent = hours;
    document.getElementById("minutes").textContent = minutes;
    document.getElementById("seconds").textContent = seconds;

    if (distance < 0) {
        const countdownContainer = document.querySelector(".event-countdown");
        countdownContainer.classList.add("alert");
        countdownContainer.innerHTML = `Event has started`;
    }
}, 1000);

const eventDateText = document.getElementById("event-date");
eventDateText.textContent = `Fecha: ${new Date(eventDate).toLocaleDateString(
    "es-ES",
    {
        year: "numeric",
        month: "long",
        day: "numeric",
    }
)} a las ${new Date(eventDate).toLocaleTimeString("es-ES", {
    hour: "2-digit",
    minute: "2-digit",
    hour12: true,
})}`;
