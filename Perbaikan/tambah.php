<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_produk = $_POST['nama_produk'];
    $nama_brand = $_POST['nama_brand'];
    $nama_kategori = $_POST['nama_kategori'];
    $size = $_POST['size'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    tambahProduk($nama_produk, $nama_brand, $nama_kategori, $size, $harga, $stok);
    header("Location: tampilan.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tambah Data Stok Sepatu</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
            }
            
            h2 {
                color: #333;
                text-align: center;
            }

            form input {
                margin: 10px 10px;
                padding: 6px 8px;
                font-size: 14px;
                text-align: left;
                border-radius: 4px;
                border: 1px solid #ccc;
                height: 25px;
                width: 90%;
            }
            
            form button {
                margin: 10px 0;
                padding: 10px 30px;
                font-size: 14px;
                border-radius: 8px;
                border: 1px solid #ccc;
                background-color: #7575FF;
                color: white;
                border: none;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            
            form button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>
        <h2>Tambah Data Sepatu</h2>
        <form action="" method="POST">
            <input type="text" name="nama_produk" placeholder="Nama Produk" required>
            <input type="text" name="nama_brand" placeholder="Brand" required>
            <input type="text" name="nama_kategori" placeholder="Kategori" required>
            <input type="text" name="size" placeholder="Size" required>
            <input type="text" name="harga" placeholder="Harga" required step="0.01">
            <input type="number" name="stok" placeholder="Stok" required>
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </body>
</html>