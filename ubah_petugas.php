<?php

if(isset($_GET['id_petugas'])) {
 
    $id_petugas = $_GET['id_petugas'];


    include "koneksi.php";


    $query = mysqli_query($cihuy, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");


    if(mysqli_num_rows($query) > 0) {
      
        $data_petugas = mysqli_fetch_array($query);
    } else {
        // Jika data petugas tidak ditemukan, tampilkan pesan kesalahan
        echo "Petugas tidak ditemukan.";
        exit(); // Hentikan eksekusi skrip jika tidak ada data petugas yang ditemukan
    }
} else {
    // Jika parameter id_petugas tidak diterima, tampilkan pesan kesalahan
    echo "ID Petugas tidak ditemukan.";
    exit(); // Hentikan eksekusi skrip jika tidak ada parameter id_petugas yang diterima
}

// Proses form jika ada data yang dikirim melalui metode POST
if($_POST) {
    // Ambil nilai-nilai yang dikirim melalui form
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $level = $_POST['level'];

    // Buat query untuk mengupdate data petugas berdasarkan id_petugas
    $update = mysqli_query($cihuy, "UPDATE petugas SET nama_petugas = '$nama_petugas', username = '$username', level = '$level' WHERE id_petugas = '$id_petugas'");

    // Periksa apakah proses update berhasil
    if($update) {
        // Jika berhasil, arahkan kembali ke halaman tampil_petugas.php
        header("Location: tampil_petugas.php");
        exit(); // Hentikan eksekusi skrip setelah melakukan pengalihan halaman
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "Gagal mengubah petugas. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Petugas Lintang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 class="mb-4">Ubah Petugas nya Lintang</h3>
        <form method="post">
            <div class="mb-3">
                <label for="nama_petugas" class="form-label">Nama Petugas:</label>
                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= $data_petugas['nama_petugas'] ?>">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $data_petugas['username'] ?>">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level:</label>
                <select class="form-select" id="level" name="level">
                    <option value="pengawas" <?= ($data_petugas['level'] == 'pengawas') ? 'selected' : '' ?>>Pengawas</option>
                    <option value="pengelola" <?= ($data_petugas['level'] == 'pengelola') ? 'selected' : '' ?>>Pengelola</option>
                    <option value="entitas_lain">entitas_lain</option>
                                <option value="open_joki_popIce">open_joki_popIce</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
