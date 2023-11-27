
function formatNumberWithComma(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
const valueInput = document.querySelectorAll(".numberin");
valueInput.forEach((input) => {
    const originalValue = input.value;
    const formattedValue = formatNumberWithComma(originalValue);
    input.value = formattedValue;
});

function setInputValue() {
    var radioButtons = document.querySelectorAll('input[type="radio"]');
    var inputField = document.getElementById("input-tunjangan-jabatan");

    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            inputField.value = radioButtons[i].value;
            break;
        }
    }
}
function setTotal() {
    var gapok = document.getElementById("input-gaji-pokok");
    var tunjab = document.getElementById("input-tunjangan-jabatan");
    var tunjah = document.getElementById("input-tunjangan-ahli");
    var total = document.getElementById("total-gaji1");
    total.value =
        parseInt(gapok.value) + parseInt(tunjab.value) + parseInt(tunjah.value);
    console.log(
        parseInt(gapok.value) + parseInt(tunjab.value) + parseInt(tunjah.value)
    );
    const valueInput = document.querySelectorAll(".numberin");
    valueInput.forEach((input) => {
        const originalValue = input.value;
        const formattedValue = formatNumberWithComma(originalValue);
        input.value = formattedValue;
    });
}
var gapok = document.getElementById("input-gaji-pokok");
var tunjab = document.getElementById("input-tunjangan-jabatan");
var tunjah = document.getElementById("input-tunjangan-ahli");
var tunjab_fungsional = document.getElementById("tunjab-type-Fungsional");
var tunjab_struktural = document.getElementById("tunjab-type-struktural");

gapok.addEventListener("change", setTotal);
tunjab.addEventListener("change", setTotal);
tunjah.addEventListener("change", setTotal);
// window.addEventListener('load', setInputValue);
tunjab_fungsional.addEventListener("change", setTotal);
tunjab_struktural.addEventListener("change", setTotal);
