<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 class="mb-4">Daftar Produk</h3>
        <a href="tambah&proses_produk.php" class="btn btn-primary mb-3">Tambah Produk</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";

                // Query untuk mengambil data produk dari database
                $query = mysqli_query($cihuy, "SELECT * FROM produk");
                $no = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td>{$row['nama_produk']}</td>";
                    echo "<td>{$row['harga']}</td>";
                    echo "<td>
                            <a href='ubah_produk.php?id={$row['id_produk']}' class='btn btn-sm btn-primary'>Ubah</a>
                            <a href='hapus_produk.php?id={$row['id_produk']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Lintang, kau yakin mau hapus produk ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
