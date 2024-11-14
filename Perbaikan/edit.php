<?php
include 'koneksi.php';

if (isset($_GET['produk_id'])) {
    $produk_id = $_GET['produk_id'];
    $produk = getProdukId($produk_id);
}

if (isset($_POST['edit'])) {
    $produk_id = $_POST['produk_id'];
    $nama_produk = $_POST['nama_produk'];
    $nama_brand = $_POST['nama_brand'];
    $nama_kategori = $_POST['nama_kategori'];
    $size = $_POST['size'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    if (editProduk($produk_id, $nama_produk, $nama_brand, $nama_kategori, $size, $harga, $stok)) {
        header("Location: tampilan.php");
    } else {
        echo "Gagal mengupdate data produk.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Data</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
            }

            h2 {
                text-align: center;
                color: #333;
            }

            form {
                background-color: white;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 500px;
                margin: 0 auto;
                padding: 20px;
            }

            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
                color: #555;
            }

            input[type="text"],
            input[type="number"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 3px;
                box-sizing: border-box;
            }

            button, a {
                width: 100%;
                padding: 10px;
                background-color: #7575FF;
                color: white;
                border: none;
                border-radius: 3px;
                cursor: pointer;
                font-size: 16px;
            }

            button:hover, a:hover {
                background-color: #007BFF;
            }

            @media (max-width: 600px) {
                form {
                    padding: 15px;
                    width: 90%;
                }
            }
        </style>
    </head>
    <body>
        <form method="post" action="">
            <h2>Edit Data Sepatu</h2>

            <input type="hidden" name="produk_id" value="<?= $produk['produk_id']; ?>">
            <label>Nama Produk:</label><br>
            <input type="text" name="nama_produk" value="<?= $produk['nama_produk']; ?>" required><br>

            <label>Nama Brand:</label><br>
            <input type="text" name="nama_brand" value="<?= $produk['nama_brand']; ?>" required><br>

            <label>Nama Kategori:</label><br>
            <input type="text" name="nama_kategori" value="<?= $produk['nama_kategori']; ?>" required><br>

            <label>Size:</label><br>
            <input type="number" name="size" value="<?= $produk['size']; ?>" required><br>

            <label>Harga:</label><br>
            <input type="text" name="harga" value="<?= $produk['harga']; ?>" required><br>

            <label>Stok:</label><br>
            <input type="number" name="stok" value="<?= $produk['stok']; ?>" required><br>

            <button type="submit" name="edit">Update</button><br><br>

            <a href="tampilan.php">Kembali</a>
        </form>
    </body>
</html>