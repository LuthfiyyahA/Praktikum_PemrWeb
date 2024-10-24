<?php
include '../Koneksi/koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $checkEmail = $conn->prepare("SELECT * FROM pengguna WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if ($result->num_rows > 0) {
        echo "<script type='text/javascript'>
                alert('E-mail sudah terdaftar. Silakan gunakan E-mail lain.');
                window.location.href = 'registrasi.php';
             </script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO pengguna (nama, email, pass) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $nama, $email, $password);
        
        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                alert('Registrasi berhasil!');
                window.location.href = 'registrasi.php';
             </script>";
        } else {
            echo "<script type='text/javascript'>
                alert('Registrasi gagal. Silakan coba lagi.');
                window.location.href = 'registrasi.php';
             </script>";
        }
        $stmt->close();
    }
    $checkEmail->close();
}
$conn->close();
?>