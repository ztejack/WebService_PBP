// Add an event listener to the date_start input
const dateStartInput = document.getElementById('date_start');
const tenureInput = document.getElementById('tenure');
const val_tenure = document.getElementById('val_tenure');

dateStartInput.addEventListener('change', calculateTenure);
window.addEventListener('load', function () {
    // Code to be executed when the window has finished loading
    if (dateStartInput.value === null || dateStartInput.value === '') {
        tenureInput.value = '';
    }
    else {
        calculateTenure();
    }
});
// Function to calculate the difference between two dates
function calculateTenure() {
    // Get the selected date from the date_start input
    const dateStart = new Date(dateStartInput.value);

    // Calculate the current date (now)
    const now = new Date();

    // Calculate the time difference in milliseconds
    const timeDifference = now - dateStart;

    // Calculate the difference in days, weeks, months, and years
    const daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
    const weeksDifference = Math.floor(daysDifference / 7);
    const monthsDifference = now.getMonth() - dateStart.getMonth() + (12 * (now.getFullYear() - dateStart.getFullYear()));
    const yearsDifference = now.getFullYear() - dateStart.getFullYear();

    // Update the tenure input with the calculated values
    tenureInput.value = `Years: ${yearsDifference}, Months: ${monthsDifference}, Weeks: ${weeksDifference}, Days: ${daysDifference}`;
    val_tenure.value = [yearsDifference, monthsDifference, weeksDifference, daysDifference];
    console.log(val_tenure.value)
}

