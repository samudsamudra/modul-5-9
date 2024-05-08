<?php
// Mulai sesi
session_start();

// Lakukan koneksi ke database
include "koneksi.php";

// Periksa apakah pengguna telah login
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    // Jika tidak, redirect ke halaman login
    header('location: login_pelanggan.php');
    exit();
}

// Inisialisasi variabel data transaksi
$id_produk = $nama_produk = $harga = $jumlah = $total_harga = '';

// Periksa apakah data transaksi telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data transaksi dari formulir
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    // Konversi harga ke tipe data float
    $harga = (float) $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total_harga = $_POST['total_harga'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Detail Transaksi</h2>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Produk: <?php echo $nama_produk; ?></h5>
                <!-- Ubah format harga ke dalam format mata uang -->
                <p class="card-text">Harga per unit: Rp <?php echo number_format($harga, 0, ',', '.'); ?></p>
                <p class="card-text">Jumlah: <?php echo $jumlah; ?></p>
                <!-- Ubah format total harga ke dalam format mata uang -->
                <p class="card-text">Total harga: Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></p>
                <form action="proses_transaksi.php" method="post">
                    <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                    <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
                    <input type="hidden" name="total_harga" value="<?php echo $total_harga; ?>">
                    <button type="submit" class="btn btn-primary">Konfirmasi Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
