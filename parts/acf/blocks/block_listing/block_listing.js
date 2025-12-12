function tableListing() {
    const select = document.getElementById("listing_select");
    const rows = document.querySelectorAll(".listing_company_row");

    function updateActiveRow() {
        const value = select.value;
        rows.forEach(row => {
            row.classList.toggle("active", row.dataset.value === value);
        });
    }

    // Appliquer au chargement
    updateActiveRow();

    // Appliquer à chaque changement
    select.addEventListener("change", updateActiveRow);
}

document.addEventListener("DOMContentLoaded", () => {
    tableListing();
});