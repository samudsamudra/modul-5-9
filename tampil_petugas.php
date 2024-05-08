<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Petugas cihuyyy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
        }
        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="mb-4">Tampil Petugas</h3>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA PETUGAS</th>
                    <th>USERNAME</th>
                    <th>LEVEL</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "koneksi.php";
                $qry_petugas = mysqli_query($cihuy, "SELECT * FROM petugas");
                $no = 0;
                while ($data_petugas = mysqli_fetch_array($qry_petugas)) {
                    $no++;?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data_petugas['nama_petugas'] ?></td>
                        <td><?= $data_petugas['username'] ?></td>
                        <td><?= $data_petugas['level'] ?></td>
                        <td>
                            <a href="ubah_petugas.php?id_petugas=<?= $data_petugas['id_petugas'] ?>" class="btn btn-success btn-action">Ubah</a>
                            <a href="hapus_petugas.php?id_petugas=<?= $data_petugas['id_petugas'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-action">Hapus</a>
                        </td>
                    </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
