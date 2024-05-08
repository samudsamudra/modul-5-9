<?php
session_start();
include "koneksi.php";

$query = "SELECT * FROM produk";
$result = mysqli_query($cihuy, $query);

if (mysqli_num_rows($result) > 0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .produk-card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Daftar Produk</h2>
        <div class="row">
<?php
    while ($row = mysqli_fetch_assoc($result)) {
?>
            <div class="col-md-4 mb-4">
                <div class="card produk-card">
                    <img src="../image/download (6).jpeg" class="card-img-top" alt="<?php echo $row['nama_produk']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
                        <p class="card-text">Deskripsi: <?php echo $row['deskripsi']; ?></p>
                        <p class="card-text">Harga: Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                        <form action="checkout.php" method="post">
                            <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
                            <input type="hidden" name="nama_produk" value="<?php echo $row['nama_produk']; ?>">
                            <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>">
                            <button type="submit" class="btn btn-primary">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
<?php
    }
?>
        </div>
    </div>
</body>
</html>
<?php
} else {
    echo "Belum ada produk yang tersedia.";
}
?>
