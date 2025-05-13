// main.js - Custom scripts for TutorPro

document.addEventListener("DOMContentLoaded", function () {
    console.log("TutorPro site loaded");

    // Example: Toggle mobile menu
    const toggleBtn = document.getElementById("menu-toggle");
    const navMenu = document.getElementById("mobile-menu");

    if (toggleBtn && navMenu) {
        toggleBtn.addEventListener("click", () => {
            navMenu.classList.toggle("hidden");
        });
    }
});
