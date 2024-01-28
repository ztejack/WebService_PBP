<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<body>
    <div id="app">
        <label>Email:</label>
        <input id="email" type="text" />

        <label>Password:</label>
        <input id="password" type="password" />

        <button onclick="validate('superuser@example.com')">form</button>
    </div>

    <script>
        function form() {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            axios.post('http://127.0.0.1:8000/test/test', {
                    email: email
                })
                .then(response => {
                    // response.data.credential.email
                    validate(response.data.email);

                })
                .catch(error => {
                    // Handle login error
                    console.error('Login failed:', error.response.data);
                });
        }

        function validate(email) {
            // const form = document.getElementById('myForm');
            // const formData = new FormData(form);

            // Make a request to the server-side script (submitForm.php) using Fetch API
            // fetch('test.php', {
            //         method: 'POST',
            //         body: formData,
            //     })
            axios.post('{{ route('test.form') }}', {
                    email: email
                })
                .then(response => response.json())
                .then(data => {

                    console.log(data);
                })
                .catch(error => {
                    // Handle errors
                    console.log(error);
                });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</body>

</html>
