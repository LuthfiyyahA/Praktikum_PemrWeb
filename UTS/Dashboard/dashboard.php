<?php
include '../Koneksi/koneksi.php';

session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: ../Log/login.php");
    exit();
}

$userID = $_SESSION['userID'];
$userQuery = "SELECT nama FROM pengguna WHERE userID = '$userID'";
$userResult = $conn->query($userQuery);

if ($userResult && $userResult->num_rows > 0) {
    $userData = $userResult->fetch_assoc();
    $userName = $userData['nama'];
} else {
    $userName = "Pengguna";
}

$query = "SELECT * FROM catatan WHERE userID = '$userID'";
$result = $conn->query($query);

$notes = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notes[] = $row;
    }
} else {
    echo "Tidak ada catatan yang ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="dashboard.css">
        <title>Dashboard</title>
    </head>

    <body>
        <nav>
            <div class="container">
                <a class="logo">MyNotes</a>
                <ul class="nav-links">
                    <a href="dashboard.php" class="nav-link">Home</a>
                    <a href="../Catatan/note.php" class="nav-link">Add Notes</a>
                    <a href="../Catatan/hapus_note.php" class="nav-link">Delete Notes</a>
                </ul>
                <div class="user-actions">
                    <div class="user-icon">
                    <span>Hi! <?php echo htmlspecialchars($userName); ?></span>
                    </div><a href="../Log/logout.php">
                    <button class="btn btn-outline">Log Out</button></a>
                </div>
            </div>
        </nav>

        <div class="kotak">
            <header>
                <h1>Dashboard Catatan Pribadi</h1>
            </header>

            <section id="notes-list">
                <h2>Daftar Catatan</h2>
                <ul id="notes">
                    <?php foreach ($notes as $note): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($note['judul']); ?></strong>
                            <p><?php echo htmlspecialchars($note['content']); ?></p>
                            <a href="../Catatan/edit_note.php?noteID=<?php echo $note['noteID']; ?>">Edit</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section id="recent-notes">
                <h2>Catatan Terbaru</h2>
                <ul id="recent">
                    <?php foreach ($notes as $note): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($note['judul']); ?></strong>
                            <p><?php echo htmlspecialchars($note['content']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>

    </body>
</html>