function formatNumberWithComma(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
const valuespan = document.querySelectorAll(".numberin");
valuespan.forEach((span) => {
    const originalValue = span.innerHTML;
    const formattedValue = formatNumberWithComma(originalValue);
    span.innerHTML = formattedValue;
});
