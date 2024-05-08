<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8d7da; /* Warna merah kalem */
            color: #721c24; /* Warna teks */
        }
        .card {
            border-color: #721c24; /* Warna border card */
        }
        .container {
            max-width: 800px; /* Lebar maksimum kontainer */
        }
    </style>
</head>
<body>
    <?php include "header.php"; ?> <!-- Menggunakan header.php untuk bagian header -->
    
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Buku</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../image asset/download (3).jpeg" class="card-img-top" alt="Buku 1">
                    <div class="card-body">
                        <h5 class="card-title">Buku anti gempa</h5>
                        <p class="card-text">buku titik kumpul.</p>
                        <a href="pinjam_buku.php" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../image asset/download (4).jpeg" class="card-img-top" alt="Buku 2">
                    <div class="card-body">
                        <h5 class="card-title">Buku u have money</h5>
                        <p class="card-text">Buku Filsafat.</p>
                        <a href="pinjam_buku.php" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../image asset/His name is also effort.jpeg" class="card-img-top" alt="Buku 3">
                    <div class="card-body">
                        <h5 class="card-title">Buku bahasa yang di sembunyikan</h5>
                        <p class="card-text">Bahasa Inggris be like.</p>
                        <a href="pinjam_buku.php" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>3

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
