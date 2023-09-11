// Function to initialize the phone input and mask
window.addEventListener('load', function () {
    const phoneInput = document.getElementById('phonenumber');

    // Function to remove leading zeros
    function removeLeadingZeros() {
        let phoneNumber = phoneInput.value;
        // phoneNumber = phoneNumber.replace(/^0+/, '');
        // phoneInput.value = phoneNumber;
        // Hilangkan semua karakter selain angka
    phoneNumber = phoneNumber.replace(/\D/g, '');

    // Periksa apakah dua karakter pertama adalah nol setelah +62
    if (phoneNumber.startsWith('62')) {
        phoneNumber = '62' + phoneNumber.substring(2).replace(/^0+/, '');
    }

    // Terapkan format pola masking
    const formattedPhoneNumber = phoneNumber.replace(/(\d{2})(\d{3})(\d{4})(\d{4})(\d{2})/, '{+$1} $2 $3-$4-$5');

    phoneInput.value = formattedPhoneNumber;
    }

    // Apply the function to remove leading zeros when the window loads
    removeLeadingZeros();

    // Apply the IMask after removing leading zeros (if needed)
    const phoneMask = IMask(phoneInput, {
        mask: '{+62} 000 0000-0000-00',
        // lazy: false,
    });
});

// Add an input event listener to handle changes in the phone input
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
const nipInput = document.getElementById('nip');

const nipMask = IMask(nipInput, {
    mask:'00000000-000000-0-000'
})

const npwpInput = document.getElementById('npwp');

const npwpMask = IMask(npwpInput, {
    mask:'00.000.000.0-000.0000'
})
