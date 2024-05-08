<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pelanggan</title>
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
        <h3 class="mb-4">Ubah Pelanggan</h3>
        <?php
        // Lakukan koneksi ke database
        include "koneksi.php";

        // Periksa apakah parameter id_pelanggan telah diterima melalui URL
        if(isset($_GET['id'])) {
            // Ambil nilai id_pelanggan dari URL
            $id_pelanggan = $_GET['id'];

            // Buat query untuk mengambil data pelanggan berdasarkan id_pelanggan
            $query = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
            $result = mysqli_query($cihuy, $query);

            // Periksa apakah data pelanggan ditemukan
            if(mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_assoc($result);
        ?>
        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pelanggan:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $data['alamat']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telepon:</label>
                <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $data['telp']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="ubah">Ubah Pelanggan</button>
        </form>
        <?php
            } else {
                echo "<p>Data pelanggan tidak ditemukan.</p>";
            }
        } else {
            echo "<p>ID pelanggan tidak tersedia.</p>";
        }

        // Proses form jika data sudah disubmit
        if(isset($_POST['ubah'])) {
            // Ambil nilai-nilai yang dikirim melalui form
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $telp = $_POST['telp'];

            // Buat query untuk mengupdate data pelanggan ke database
            $update = mysqli_query($cihuy, "UPDATE pelanggan SET nama = '$nama', alamat = '$alamat', telp = '$telp' WHERE id_pelanggan = '$id_pelanggan'");

            // Periksa apakah proses pengubahan berhasil
            if($update) {
                echo "<script>alert('Data pelanggan berhasil diubah.'); window.location='tampil_pelanggan.php';</script>";
                exit(); // Hentikan eksekusi skrip setelah melakukan pengalihan halaman
            } else {
                echo "<script>alert('Gagal mengubah data pelanggan. Silakan coba lagi.'); window.location='ubah_pelanggan.php?id=$id_pelanggan';</script>";
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
