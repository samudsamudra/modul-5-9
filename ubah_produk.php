<?php
// Lakukan koneksi ke database
include "koneksi.php";

// Periksa apakah parameter id_produk telah dikirim melalui URL
if(isset($_GET['id'])) {
    // Ambil nilai id_produk dari URL
    $id_produk = $_GET['id'];

    // Buat query untuk mengambil data produk dari database berdasarkan id_produk
    $query = mysqli_query($cihuy, "SELECT * FROM produk WHERE id_produk = '$id_produk'");

    // Periksa apakah data produk ditemukan berdasarkan id_produk
    if(mysqli_num_rows($query) > 0) {
        // Ambil data produk dari hasil query
        $data = mysqli_fetch_assoc($query);
    } else {
        // Jika data produk tidak ditemukan, tampilkan pesan kesalahan
        echo "<script>alert('Produk tidak ditemukan'); window.location='tampil_produk.php';</script>";
        exit(); // Hentikan eksekusi skrip setelah melakukan pengalihan halaman
    }
} else {
    // Jika parameter id_produk tidak tersedia, tampilkan pesan kesalahan
    echo "<script>alert('ID produk tidak tersedia'); window.location='tampil_produk.php';</script>";
    exit(); // Hentikan eksekusi skrip setelah melakukan pengalihan halaman
}

// Proses form jika data sudah disubmit
if(isset($_POST['simpan'])) {
    // Ambil nilai-nilai yang dikirim melalui form
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];

    // Buat query untuk memperbarui data produk ke database
    $update = mysqli_query($cihuy, "UPDATE produk SET nama_produk = '$nama_produk', harga = '$harga' WHERE id_produk = '$id_produk'");

    // Periksa apakah proses pembaruan berhasil
    if($update) {
        // Jika berhasil, arahkan kembali ke halaman tampil_produk.php
        echo "<script>alert('Data produk berhasil diperbarui'); window.location='tampil_produk.php';</script>";
        exit(); // Hentikan eksekusi skrip setelah melakukan pengalihan halaman
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "<script>alert('Gagal memperbarui data produk'); window.location='ubah_produk.php?id=$id_produk';</script>";
        exit(); // Hentikan eksekusi skrip setelah melakukan pengalihan halaman
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 class="mb-4">Ubah Produk</h3>
        <form method="post">
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $data['nama_produk']; ?>">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $data['harga']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
