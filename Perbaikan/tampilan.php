<?php
include 'koneksi.php';

if (isset($_GET['hapus'])) {
    $produk_id = $_GET['hapus'];
    hapusProduk($produk_id);
    header("Location: tampilan.php");
}

$data = getProduk();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stok Sepatu</title>
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

            .button-container {
                width: 90%;
                display: flex;
                justify-content: left;
                margin-bottom: 10px;
            }

            .button-tambah {
                display: inline-block;
                margin: 10px 0;
                padding: 10px 20px;
                background-color: #7575FF;
                color: white;
                text-decoration: none;
                border-radius: 8px;
                transition: background-color 0.3s, color 0.3s;
            }
            
            .button-tambah:hover {
                background-color: #007BFF;
            }
            
            table {
                width: 90%;
                border-collapse: collapse;
                margin: 20px 0;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }
            
            td {
                padding: 18px 15px;
                text-align: left;
            }
            
            .harga {
                padding: 18px 15px;
                text-align: right;
            }
            
            th {
                background-color: #BABAFF;
                color: white;
                padding: 18px 15px;
                text-align: center;
            }
            
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            
            tr:hover {
                background-color: #E9ECEF;
            }
            
            a {
                color: #7575FF;
                text-decoration: none;
                padding: 6px 12px;
                border: 1px solid #7575FF;
                border-radius: 8px;
                transition: background-color 0.3s, color 0.3s;
            }
            
            a:hover {
                background-color: #007BFF;
                color: white;
            }

            form {
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                border-radius: 4px;
                background-color: #ffffff;
                padding: 20px;
                margin : auto;
                flex-direction: column;
                width: 90%;
            }
        </style>
    </head>

    <body>
        <h2>Daftar Stok Sepatu</h2>

        <div class="button-container">
            <a href="tambah.php" class="button-tambah">Tambah Produk</a>
        </div>

        <table border="1">
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Nama Produk</th>
                <th>Merk</th>
                <th>Kategori</th>
                <th>Size</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; foreach($data as $tabel) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $tabel['produk_id']; ?></td>
                <td><?= $tabel['nama_produk']; ?></td>
                <td><?= $tabel['nama_brand']; ?></td>
                <td><?= $tabel['nama_kategori']; ?></td>
                <td><?= $tabel['size']; ?></td>
                <td class="harga">Rp<?= $tabel['harga']; ?></td>
                <td><?= $tabel['stok']; ?></td>
                <td>
                    <a href="edit.php?produk_id=<?= $tabel['produk_id']; ?>">Edit</a><br><br>
                    <a href="tampilan.php?hapus=<?= $tabel['produk_id']; ?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>