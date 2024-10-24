<?php
include '../Koneksi/koneksi.php';
date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<html>
    <head lang="en" dir="ltr">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="registrasi.css">
        <title>Registrasi</title>
    </head>

    <body>
        <div class="container">
            <form id="regis" action="pengguna.php" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
                <div class="input-group">
                    <input type="text" placeholder="Nickname" name="nama" autocomplete="off" required>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" autocomplete="off" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="pass" autocomplete="off" required>
                </div>
                <div class="input-group">
                    <button autocomplete="off" name="submit" class="btn" value=<?php echo date("h:i:sa")?>>Register</button>
                </div>
                <p class="login-register-text"><a href="../Log/login.php">Login</a></p>
            </form>
        </div>
    </body>
</html>