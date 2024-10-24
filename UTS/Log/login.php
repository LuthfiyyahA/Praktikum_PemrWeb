<?php
include '../Koneksi/koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $stmt = $conn->prepare("SELECT userID, email FROM pengguna WHERE email = ? AND pass = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['pengguna'] = $row['email'];
        $_SESSION['userID'] = $row['userID'];
        header("Location: ../Dashboard/dashboard.php");
        exit();
    } else {
        echo "Email atau password salah.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
    <head lang="en" dir="ltr">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="login.css">
        <title>Login</title>
    </head>

    <body>
        <div class="container">
            <form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" autocomplete="off" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="pass" autocomplete="off" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>
                <p class="login-register-text">Anda belum punya akun? <a href="../Pengguna/registrasi.php">Register</a></p>
            </form>
        </div>
    </body>
</html>