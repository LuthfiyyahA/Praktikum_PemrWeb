<?php
include '../Koneksi/koneksi.php';
session_start();

if (isset($_GET['noteID'])) {
    $noteID = $_GET['noteID'];

    $stmt = $koneksi->prepare("SELECT * FROM catatan WHERE noteID = ?");
    $stmt->bind_param("i", $noteID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: ../Dashboard/dashboard.php");
        exit();
    }
}

$userID = $_SESSION['userID'];
$userQuery = "SELECT nama FROM pengguna WHERE userID = '$userID'";
$userResult = $koneksi->query($userQuery);

if ($userResult && $userResult->num_rows > 0) {
    $userData = $userResult->fetch_assoc();
    $userName = $userData['nama'];
} else {
    $userName = "Pengguna";
}

if (isset($_POST['edit'])) {
    $judul = $_POST['judul'];
    $content = $_POST['content'];
    $noteID = $_GET['noteID'];

    if (!empty($judul) && !empty($content)) {
        $stmt = $koneksi->prepare("UPDATE catatan SET judul = ?, content = ? WHERE noteID = ?");
        $stmt->bind_param("ssi", $judul, $content, $noteID);

        if ($stmt->execute()) {
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "Gagal mengupdate catatan.";
        }
        $stmt->close();
    } else {
        echo "Judul dan konten tidak boleh kosong.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head lang="en" dir="ltr">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="note.css">
        <title>MyNotes Edit</title>
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
        <form action="edit_note.php?noteID=<?php echo $noteID; ?>" method="post" class="login-email">
            <div class="input-group">
                <input type="text" placeholder="Judul" name="judul" autocomplete="off" required>
            </div>
            <div class="input-group">
                <textarea placeholder="Isi" name="content" autocomplete="off" required></textarea>
            </div>
            <input class="kirim" type="submit" name="edit" value="Edit">
        </form>
        </div>
    </body>
</html>