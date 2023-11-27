
// Lowercase username
const usernameBasic = document.getElementById('usernameBasic');
const nameBasic = document.getElementById('nameBasic');
const emailBasic = document.getElementById('emailBasic');
const phonenumber = document.getElementById('phonenumber');

const resetButton = document.getElementById('resetButton');
const submitButton = document.getElementById('submitButton');

const lowercaseAndNoSpacesMask = {
            mask: /^[a-zA-Z0-9]*$/, // Only allow letters (uppercase and lowercase)
            prepare: (str) => str.toLowerCase().replace(/\s+/g, ''), // Transform to lowercase and remove spaces
};
const mask = IMask(usernameBasic, lowercaseAndNoSpacesMask);

 // Optional: You can listen for input events to update the masked value
usernameBasic.addEventListener('input', () => {
         mask.updateValue();
});

const phoneInput = document.getElementById('phonenumber');
phoneInput.addEventListener('input', () => {
    // Function to remove leading zeros
    let phoneNumber = phoneInput.value;
    // phoneNumber = phoneNumber.replace(/^0+/, '');

    // Hilangkan semua karakter selain angka
    phoneNumber = phoneNumber.replace(/\D/g, '');

    // Periksa apakah dua karakter pertama adalah nol setelah +62
    if (phoneNumber.startsWith('62')) {
        phoneNumber = '62' + phoneNumber.substring(2).replace(/^0+/, '');
    }

    // Terapkan format pola masking
    const formattedPhoneNumber = phoneNumber.replace(/(\d{2})(\d{3})(\d{4})(\d{4})(\d{2})/, '{+$1} $2 $3-$4-$5');

    phoneInput.value = formattedPhoneNumber;
    const phoneMask = IMask(phoneInput, {
        mask: '{+62} 000 0000-0000-00',
    });
});

resetButton.addEventListener('click', () => {
    // Clear the input field
    phonenumber.value = '';
    emailBasic.value = '';
    nameBasic.value = '';
    usernameBasic.value = '';
});

// submitButton.addEventListener('click', async function () {
//     submitForm()
// })

// function submitForm() {
//             // Data yang akan dikirim ke server
//             const data = new FormData();
//             data.append('nama', nameBasic.value);
//             data.append('username', usernameBasic.value);
//             data.append('phone', phonenumber.value);
//             data.append('email', emailBasic.value);

//             // Kirim permintaan POST ke server menggunakan Axios
//             axios({
//                 method: 'post',
//                 url: 'users/store',
//                 data: data,
//                 headers: { 'Content-Type': 'multipart/form-data' }
//             })
//             .then(function (response) {
//                 // Tangani respons dari server jika sukses
//                 console.log('Sukses:', response.data);
//                 // Anda dapat menambahkan logika lain di sini, seperti menampilkan pesan sukses
//             })
//             .catch(function (error) {
//                 // Tangani kesalahan jika permintaan gagal
//                 console.error('Kesalahan:', error);
//                 // Anda dapat menambahkan logika lain di sini, seperti menampilkan pesan kesalahan
//             });
// }

