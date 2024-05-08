<?php
// Lakukan koneksi ke database
include "koneksi.php";

// Deklarasi variabel untuk menyimpan pesan hasil operasi
$pesan = '';

// Proses form jika data sudah disubmit
if(isset($_POST['simpan'])) {
    // Ambil nilai-nilai yang dikirim melalui form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    // Periksa apakah semua kolom sudah diisi
    if(empty($nama) || empty($alamat) || empty($telp)) {
        $pesan = 'Semua kolom harus diisi';
    } else {
        // Buat query untuk menyimpan data pelanggan ke database
        $insert = mysqli_query($cihuy, "INSERT INTO pelanggan (nama, alamat, telp) VALUES ('$nama', '$alamat', '$telp')");

        // Periksa apakah proses penyimpanan berhasil
        if($insert) {
            // Jika berhasil, arahkan kembali ke halaman tampil_pelanggan.php
            $pesan = 'Sukses menambahkan pelanggan';
            header('Location: tampil_pelanggan.php');
            exit(); // Hentikan eksekusi skrip setelah melakukan pengalihan halaman
        } else {
            // Jika gagal, simpan pesan kesalahan
            $pesan = 'Gagal menambahkan pelanggan. Silakan coba lagi atau periksa kembali data yang dimasukkan.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h3 {
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="mb-4">Tambah Pelanggan cihuyy</h3>
        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pelanggan:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telepon:</label>
                <input type="text" class="form-control" id="telp" name="telp">
            </div>
            <button type="submit" class="btn btn-primary" name="simpan">Tambah Pelanggan</button>
        </form>
        <?php if($pesan): ?>
            <div class="alert alert-<?php echo ($pesan == 'Sukses menambahkan pelanggan') ? 'success' : 'danger'; ?> mt-3"><?php echo $pesan; ?></div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
