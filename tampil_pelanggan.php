<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Daftar Pelanggan</h2>
        <a href="tambah&proses_pelanggan.php" class="btn btn-primary">Tambah Pelanggan</a>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Lakukan koneksi ke database
                include "koneksi.php";

                // Query untuk mengambil data pelanggan dari database
                $query = "SELECT * FROM pelanggan";
                $result = mysqli_query($cihuy, $query);

                // Periksa apakah ada data yang ditemukan
                if(mysqli_num_rows($result) > 0) {
                    // Jika ada, tampilkan data dalam bentuk tabel
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$no}</td>";
                        echo "<td>{$row['nama']}</td>";
                        echo "<td>{$row['alamat']}</td>";
                        echo "<td>{$row['telp']}</td>";
                        echo "<td>";
                        echo "<a href='ubah_pelanggan.php?id={$row['id_pelanggan']}' class='btn btn-warning btn-sm'>Ubah</a>";
                        echo "&nbsp;";
                        echo "<a href='hapus_pelanggan.php?id={$row['id_pelanggan']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    // Jika tidak ada data, tampilkan pesan kosong
                    echo "<tr><td colspan='5'>Tidak ada data pelanggan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19
