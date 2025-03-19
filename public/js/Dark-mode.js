document.addEventListener("DOMContentLoaded", function () {
    const themeSwitch = document.getElementById("theme-switch");
    const darkIcon = document.getElementById("dark-icon");
    const lightIcon = document.getElementById("light-icon");
    
    if (!themeSwitch || !darkIcon || !lightIcon) {
        console.error("Theme switch elements not found!");
        return; // Exit the function if elements are missing
    }

    // Function to apply the theme
    function applyTheme(theme) {
        if (theme === "dark") {
            document.body.classList.add("darkmode");
            darkIcon.style.display = "none";
            
            lightIcon.style.display = "inline";
        } else {
            document.body.classList.remove("darkmode");
            darkIcon.style.display = "inline";
            lightIcon.style.display = "none";
        }
    }

    // Check localStorage for user preference
    const savedTheme = localStorage.getItem("theme") || "light";
    applyTheme(savedTheme);

    // Toggle Theme on button click
    themeSwitch.addEventListener("click", function () {
        const newTheme = document.body.classList.contains("darkmode") ? "light" : "dark";
        localStorage.setItem("theme", newTheme);
        applyTheme(newTheme);
    });
});