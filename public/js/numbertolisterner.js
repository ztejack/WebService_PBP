function terbilang(bilangan) {
    bilangan = String(bilangan);
    let angka = new Array(
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0"
    );
    let kata = new Array(
        "",
        "Satu",
        "Dua",
        "Tiga",
        "Empat",
        "Lima",
        "Enam",
        "Tujuh",
        "Delapan",
        "Sembilan"
    );
    let tingkat = new Array("", "Ribu", "Juta", "Milyar", "Triliun");

    let panjang_bilangan = bilangan.length;
    let kalimat = "";
    let subkalimat = "";
    let kata1 = "";
    let kata2 = "";
    let kata3 = "";
    let i = 0;
    let j = 0;

    /* pengujian panjang bilangan */
    if (panjang_bilangan > 15) {
        kalimat = "Diluar Batas";
        return kalimat;
    }

    /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
    for (i = 1; i <= panjang_bilangan; i++) {
        angka[i] = bilangan.substr(-i, 1);
    }

    i = 1;
    j = 0;
    kalimat = "";

    /* mulai proses iterasi terhadap array angka */
    while (i <= panjang_bilangan) {
        subkalimat = "";
        kata1 = "";
        kata2 = "";
        kata3 = "";

        /* untuk Ratusan */
        if (angka[i + 2] != "0") {
            if (angka[i + 2] == "1") {
                kata1 = "Seratus";
            } else {
                kata1 = kata[angka[i + 2]] + " Ratus";
            }
        }

        /* untuk Puluhan atau Belasan */
        if (angka[i + 1] != "0") {
            if (angka[i + 1] == "1") {
                if (angka[i] == "0") {
                    kata2 = "Sepuluh";
                } else if (angka[i] == "1") {
                    kata2 = "Sebelas";
                } else {
                    kata2 = kata[angka[i]] + " Belas";
                }
            } else {
                kata2 = kata[angka[i + 1]] + " Puluh";
            }
        }

        /* untuk Satuan */
        if (angka[i] != "0") {
            if (angka[i + 1] != "1") {
                kata3 = kata[angka[i]];
            }
        }

        /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
        if (angka[i] != "0" || angka[i + 1] != "0" || angka[i + 2] != "0") {
            subkalimat =
                kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " ";
        }

        /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
        kalimat = subkalimat + kalimat;
        i = i + 3;
        j = j + 1;
    }

    /* mengganti Satu Ribu jadi Seribu jika diperlukan */
    if (angka[5] == "0" && angka[6] == "0") {
        kalimat = kalimat.replace("Satu Ribu", "Seribu");
    }

    return kalimat.trim().replace(/\s{2,}/g, " ") + " Rupiah";
}
window.addEventListener("load", () => {
    const spell = document.getElementById("spelling");
    const number = document.getElementById("ttlterima").innerText;
    spell.innerText = terbilang(number);
});
// Function to format a number with a decimal comma
function formatNumberWithComma(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
// Get all elements with the class "value-span"
const valueSpans = document.querySelectorAll(".numbers");

// Loop through the elements and format their content
valueSpans.forEach((span) => {
    const originalValue = span.textContent;
    const formattedValue = formatNumberWithComma(originalValue);
    span.textContent = formattedValue;
});
const valueInput = document.querySelectorAll(".numberin");

// Loop through the elements and format their content
valueInput.forEach((input) => {
    const originalValue = input.value;
    const formattedValue = formatNumberWithComma(originalValue);
    input.value = formattedValue;
});
