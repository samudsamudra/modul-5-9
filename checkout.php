<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header('location: login_pelanggan.php');
    exit();
}

if (isset($_POST['id_produk'])) {
    $id_produk = $_POST['id_produk'];
    $query = "SELECT * FROM produk WHERE id_produk = $id_produk";
    $result = mysqli_query($cihuy, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $produk = mysqli_fetch_assoc($result);
    } else {
        header('location: belanja.php');
        exit();
    }
} else {
    header('location: belanja.php');
    exit();
}

$jumlah = 1;

if (isset($_POST['jumlah']) && $_POST['jumlah'] > 0) {
    $jumlah = $_POST['jumlah'];
}

$total_harga = $produk['harga'] * $jumlah;

if (isset($_POST['tambah'])) {
    $jumlah++;
    $total_harga = $produk['harga'] * $jumlah;
}

if (isset($_POST['kurang']) && $jumlah > 1) {
    $jumlah--;
    $total_harga = $produk['harga'] * $jumlah;
}

if (isset($_POST['beli_sekarang'])) {
    header('location: sukses.php');
    exit();
}

if (isset($_POST['batalkan'])) {
    header('location: belanja.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Checkout Produk</h2>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><?php echo $produk['nama_produk']; ?></h5>
                <p class="card-text">Deskripsi: <?php echo $produk['deskripsi']; ?></p>
                <p class="card-text">Harga: Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?></p>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="jumlah">Jumlah:</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?php echo $jumlah; ?>" min="1">
                    </div>
                    <p class="card-text">Total harga: Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></p>
                    <button type="submit" name="tambah" class="btn btn-success me-2">Tambah</button>
                    <button type="submit" name="kurang" class="btn btn-warning me-2">Kurang</button>
                    <button type="submit" name="beli_sekarang" class="btn btn-primary me-2">Beli Sekarang</button>
                    <button type="submit" name="batalkan" class="btn btn-danger">Batalkan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
