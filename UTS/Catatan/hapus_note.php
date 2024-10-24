<?php
include '../Koneksi/koneksi.php';
session_start();

$userID = $_SESSION['userID'];
$userQuery = "SELECT nama FROM pengguna WHERE userID = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param('i', $userID);
$stmt->execute();
$userResult = $stmt->get_result();

if ($userResult && $userResult->num_rows > 0) {
    $userData = $userResult->fetch_assoc();
    $userName = $userData['nama'];
} else {
    $userName = "Pengguna";
}

if (isset ($_GET['judul'])) {
    $judul = $_GET['judul'];

    $query = $conn->prepare("DELETE FROM catatan WHERE judul = ?");
    $query->bind_param('s', $judul); 
    $query->execute();

    if ($query->affected_rows > 0) {
        header('Location: ../Dashboard/dashboard.php');
        exit();
    } else {
        echo "Penghapusan catatan gagal atau catatan tidak ditemukan.";
    }
    $query->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
    <head lang="en" dir="ltr">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="note.css">
        <title>MyNotes Delete</title>
    </head>

    <body>
        <nav>
            <div class="box">
                <a class="logo">MyNotes</a>
                <ul class="nav-links">
                    <a href="../Dashboard/dashboard.php" class="nav-link">Home</a>
                    <a href="note.php" class="nav-link">Add Notes</a>
                    <a href="hapus_note.php" class="nav-link">Delete Notes</a>
                </ul>
                <div class="user-actions">
                <div class="user-icon">
                        <span>Hi! <?php echo htmlspecialchars($userName); ?></span>
                    </div>
                    <a href="../Log/logout.php">
                        <button class="btn btn-outline">Log Out</button>
                    </a>
                </div>
            </div>
        </nav>

        <div class="container">
            <form action="hapus_note.php" method="get" class="login-email">
                <div class="input-group">
                    <input type="text" placeholder="Judul Catatan" name="judul" autocomplete="off" required>
                </div>
                <input class="kirim" type="submit" value="Hapus">
            </form>
        </div>
    </body>
</html>