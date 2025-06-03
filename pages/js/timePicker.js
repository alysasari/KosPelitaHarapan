document.addEventListener("DOMContentLoaded", function () {
    const monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    const now = new Date();
    const currentMonth = monthNames[now.getMonth()];
    const currentYear = now.getFullYear();

    const titleElement = document.getElementById("currentMonthTitle");
    if (titleElement) {
        titleElement.textContent = `Select a time for ${currentMonth} ${currentYear}`;
    }
});
