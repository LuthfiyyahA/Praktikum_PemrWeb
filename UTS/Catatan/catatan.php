<?php
include '../Koneksi/koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $content = $_POST['content'];

    if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];

        $stmt = $conn->prepare("INSERT INTO catatan (userID, judul, content) VALUES(?, ?, ?)");
        $stmt->bind_param("iss", $userID,  $judul, $content); // Bind parameters
        
        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                alert('Catatan Berhasil ditambahkan!');
                window.location.href = 'note.php';
             </script>";
        } else {
            echo "<script type='text/javascript'>
                alert('Gagal menambahkan catatan');
                window.location.href = 'note.php';
             </script>";
        }

        $stmt->close();
    } else {
        echo "User ID tidak ditemukan.";
    }
}
?>