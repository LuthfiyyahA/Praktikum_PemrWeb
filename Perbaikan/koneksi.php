<?php
try {
    $koneksi = new PDO("sqlsrv:server=DESKTOP-PV4Q3S5\SQLEXPRESS;database=ShoeStore");
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Koneksi gagal: " . $error->getMessage();
}

function tambahProduk($nama_produk, $nama_brand, $nama_kategori, $size, $harga, $stok) {
    global $koneksi;
    $query = "INSERT INTO products (nama_produk, nama_brand, nama_kategori, size, harga, stok) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    return $stmt->execute([$nama_produk, $nama_brand, $nama_kategori, $size, $harga, $stok]);
}

function editProduk($produk_id, $nama_produk, $nama_brand, $nama_kategori, $size, $harga, $stok) {
    global $koneksi;
    $query = "UPDATE products SET nama_produk=?, nama_brand=?, nama_kategori=?, size=?, harga=?, stok=? WHERE produk_id=?";
    $stmt = $koneksi->prepare($query);
    return $stmt->execute([$nama_produk, $nama_brand, $nama_kategori, $size, $harga, $stok, $produk_id]);
}

function hapusProduk($produk_id) {
    global $koneksi;
    $query = "DELETE FROM products WHERE produk_id=?";
    $stmt = $koneksi->prepare($query);
    return $stmt->execute([$produk_id]);
}

function getProduk() {
    global $koneksi;
    $query = "SELECT * FROM products";
    $stmt = $koneksi->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProdukId($produk_id) {
    global $koneksi;
    $query = "SELECT * FROM products WHERE produk_id=?";
    $stmt = $koneksi->prepare($query);
    $stmt->execute([$produk_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>