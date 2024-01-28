<?php
// ini_set('display_errors', 1); //Atauerror_reporting(E_ALL && ~E_NOTICE);
// session_start();

// include "fungsi/koneksi.php";
// //include "fungsi/ceklogin.php";

// $err = "";

// if (isset($_POST['login'])) {
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     // $level = $_POST['level'];
//     // $jabatan = $_POST['jabatan'];

//     $query = "SELECT * FROM data_karyawan WHERE email='$email' && password='$password'";
//     $hasil = mysqli_query($koneksi, $query);

//     if (!$hasil) {
//         echo "ada error";
//     }

//     if (mysqli_num_rows($hasil) == 0) {
//         $err = "
// 		<div class='row' style='margin-top: 15px';>
// 		<div class='col-md-12'>
// 		<div class='box box-solid bg-red'>
// 		<div class='box-header'>
// 		<h3 class='box-title'>Login Gagal!</h3>
// 		</div>
// 		<div class='box-body'>
// 		<p>Username atau password yang anda masukan salah.</p>
// 		</div>
// 		</div>
// 		</div>
// 		</div>
// 		</div>";
//     } else {
//         $row = mysqli_fetch_array($hasil);
//         $_SESSION['nama'] = $row['nama'];

//         $_SESSION['username'] = $row['username'];
//         $_SESSION['jab'] = $row['jab'];
//         $_SESSION['Level'] = $row['Level'];
//         $_SESSION['nip'] = $row['nip'];
//         $_SESSION['pangkat'] = $row['pangkat'];
//         $_SESSION['email'] = $row['email'];

// <?php
// if (isset($_POST['login'])){
// dd($_POST);
<?php

// Assuming the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'email' parameter is set in the POST data
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'pbp';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Use a prepared statement to avoid SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if the query was successful
        if ($result) {
            // Fetch data and store it in an array
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            // Free result set
            $result->free_result();

            // Close the statement and connection
            $stmt->close();
            $conn->close();

            // Return the data as JSON
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            echo 'Error in query: ' . $conn->error;
        }
    } else {
        echo 'Email parameter is missing in the POST request.';
    }
} else {
    echo 'Invalid request method.';
}

?>
