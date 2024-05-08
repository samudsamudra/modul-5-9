<?php
// Buat koneksi ke database di sini jika diperlukan

// Inisialisasi pesan
$pesan = "";

// Dummy data buku (untuk contoh)
$daftar_buku = [
    1 => [
        'judul' => 'Buku 1',
        'cover' => '../image asset/download (3).jpeg'
    ],
    2 => [
        'judul' => 'Buku 2',
        'cover' => '../image asset/download (4).jpeg'
    ],
    3 => [
        'judul' => 'Buku 3',
        'cover' => '../image asset/His name is also effort.jpeg'
    ]
];

// Periksa apakah tombol "Pinjam" ditekan
if(isset($_POST['pinjam'])) {
    // Ambil data yang dikirimkan dari form
    $id_siswa = $_POST['id_siswa'];
    $id_buku = $_POST['id_buku'];

    // Lakukan proses peminjaman buku di sini, misalnya dengan menambahkan data ke database
    // Lakukan validasi tanggal peminjaman dan pengembalian jika diperlukan
    // Contoh:
    // $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    // $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    // Lakukan eksekusi query dan periksa apakah proses peminjaman berhasil

    // Setelah proses peminjaman selesai, berikan pesan atau tindakan lain kepada pengguna
    $pesan = "Buku berhasil dipinjam oleh siswa dengan ID $id_siswa";
} elseif(isset($_POST['kembalikan'])) {
    // Periksa apakah tombol "Kembalikan" ditekan
    // Lakukan proses pengembalian buku di sini jika diperlukan
    // Misalnya, hapus data peminjaman dari database atau tandai buku sebagai telah dikembalikan

    // Setelah proses pengembalian selesai, berikan pesan atau tindakan lain kepada pengguna
    $pesan = "Buku berhasil dikembalikan";
}

// Ambil ID buku yang dipilih
$id_buku_terpilih = isset($_POST['id_buku']) ? $_POST['id_buku'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .buku-cover {
            max-width: 200px;
            max-height: 300px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Peminjaman Buku</h2>
        <?php if(isset($pesan)) : ?>
            <div class="alert alert-success" role="alert">
                <?= $pesan ?>
            </div>
        <?php endif; ?>
        <form action="peminjaman_buku.php" method="post">
            <div class="mb-3">
                <label for="idSiswa" class="form-label">ID Siswa:</label>
                <input type="text" class="form-control" id="idSiswa" name="id_siswa">
            </div>
            <div class="mb-3">
                <label for="idBuku" class="form-label">ID Buku:</label>
                <input type="text" class="form-control" id="idBuku" name="id_buku">
            </div>
            <div class="mb-3">
                <label for="tanggalPeminjaman" class="form-label">Tanggal Peminjaman:</label>
                <input type="date" class="form-control" id="tanggalPeminjaman" name="tanggal_peminjaman">
            </div>
            <div class="mb-3">
                <label for="tanggalPengembalian" class="form-label">Tanggal Pengembalian:</label>
                <input type="date" class="form-control" id="tanggalPengembalian" name="tanggal_pengembalian">
            </div>
            <button type="submit" class="btn btn-primary" name="pinjam">Pinjam</button>
            <button type="submit" class="btn btn-danger" name="kembalikan">Kembalikan</button>
        </form>
        <?php if(isset($id_buku_terpilih) && array_key_exists($id_buku_terpilih, $daftar_buku)) : ?>
            <div class="mt-5">
                <h4>Cover Buku:</h4>
                <img src="<?= $daftar_buku[$id_buku_terpilih]['cover'] ?>" alt="Cover Buku" class="buku-cover">
            </div>
        <?php endif; ?>
        <a href="buku.php" class="btn btn-primary mt-3">Kembali ke Daftar Buku</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
