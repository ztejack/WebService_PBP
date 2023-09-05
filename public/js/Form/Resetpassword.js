const resetPasswordButton = document.getElementById('resetPasswordButton');
var jsVariable = document.getElementById('resetPasswordButton').getAttribute('data-php-value');
const alertarea = document.getElementById('alertarea');
// const pesanElement = document.getElementById('pesan');

const closeButton = document.createElement('button');
closeButton.setAttribute('type', 'button');
closeButton.setAttribute('class', 'btn-close');
closeButton.setAttribute('data-bs-dismiss', 'alert');
closeButton.setAttribute('aria-label', 'Close');

const alertElement = document.createElement('div');
alertElement.setAttribute("class", 'alert-dismissible');
alertElement.setAttribute("role", 'alert');

var passwordSpan = document.createElement("span")
passwordSpan.setAttribute('class', 'fw-bold');
passwordSpan.innerText = 'PBP2023@USER';
var passwordElement = document.createElement('h6');
passwordElement.setAttribute('class', 'alert-heading mb-1');
passwordElement.innerText = "Password Default adalah : ";
passwordElement.appendChild(passwordSpan);

resetPasswordButton.addEventListener('click', async function () {
    try {
        // Lakukan permintaan ke server untuk mengatur ulang kata sandi
        const response = await axios.post('/auth/change-password',jsVariable); // Sesuaikan dengan rute yang sesuai

        // Tampilkan pesan sukses jika permintaan berhasil
        if (response.status === 200) {
            alertElement.innerText = 'Berhasil Mengatur Ulang Kata Sandi!';
            alertElement.classList.add('alert', 'alert-success');
            alertElement.appendChild(passwordElement);
            alertElement.appendChild(closeButton);
            alertarea.appendChild(alertElement);
        } else {
            // Tampilkan pesan kesalahan jika permintaan gagal
            alertElement.innerText = 'Gagal Mengatur Ulang Kata Sandi!';
            alertElement.classList.add('alert', 'alert-danger');
            alertElement.appendChild(closeButton);
            alertarea.appendChild(alertElement);
        }
    } catch (error) {
        // Tangani kesalahan jika permintaan gagal
        alertElement.innerText = 'Terjadi Kesalahan!';
        alertElement.classList.add('alert', 'alert-danger');
        alertElement.appendChild(closeButton);
        alertarea.appendChild(alertElement);
    }
});
