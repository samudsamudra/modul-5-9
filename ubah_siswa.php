<?php
// Pastikan ID siswa tersedia
if(isset($_GET['id']) && !empty($_GET['id'])){
    // Panggil file koneksi
    include "koneksi.php";

    // Ambil ID siswa dari parameter URL
    $id_siswa = $_GET['id'];

    // Query untuk mendapatkan data siswa berdasarkan ID
    $query = "SELECT * FROM siswa WHERE id_siswa = $id_siswa";
    $result = mysqli_query($conn, $query);

    // Periksa apakah data siswa ditemukan
    if(mysqli_num_rows($result) == 1){
        $siswa = mysqli_fetch_assoc($result);

        // Cek apakah form telah disubmit
        if(isset($_POST['submit'])){
            // Ambil data yang diubah dari form
            $nama_siswa = $_POST['nama_siswa'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $gender = $_POST['gender'];
            $alamat = $_POST['alamat'];
            $id_kelas = $_POST['id_kelas'];

            // Query untuk mengupdate data siswa
            $query_update = "UPDATE siswa SET nama_siswa = '$nama_siswa', tanggal_lahir = '$tanggal_lahir', gender = '$gender', alamat = '$alamat', id_kelas = '$id_kelas' WHERE id_siswa = $id_siswa";
            $result_update = mysqli_query($conn, $query_update);

            // Periksa apakah update berhasil
            if($result_update){
                // Jika berhasil, tampilkan notifikasi
                echo '<script>alert("Yey, data udah ke upgrade nih.");</script>';
                // Alihkan user ke halaman tampil siswa
                echo '<script>window.location.href = "tampil_siswa.php";</script>';
            } else {
                // Jika gagal, tampilkan pesan error
                echo '<div class="alert alert-danger mt-3">Gagal mengupdate data!</div>';
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 class="mt-3">Ubah Data Siswa</h3>
        <form id="siswaForm" action="" method="post">
            <div class="mb-3">
                <label for="namaSiswa" class="form-label">Nama Siswa:</label>
                <input type="text" name="nama_siswa" id="namaSiswa" class="form-control" value="<?= $siswa['nama_siswa'] ?>">
            </div>
            <div class="mb-3">
                <label for="tanggalLahir" class="form-label">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" id="tanggalLahir" class="form-control" value="<?= $siswa['tanggal_lahir'] ?>">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="L" <?= ($siswa['gender'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="P" <?= ($siswa['gender'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="4"><?= $siswa['alamat'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <select name="id_kelas" id="kelas" class="form-select">
                    <option></option>
                    <?php
                    $qry_kelas = mysqli_query($conn, "SELECT * FROM kelas");
                    while($kelas = mysqli_fetch_array($qry_kelas)){
                        echo '<option value="'.$kelas['id_kelas'].'" '.($kelas['id_kelas'] == $siswa['id_kelas'] ? 'selected' : '').'>'.$kelas['nama_kelas'].'</option>';    
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
<?php
    } else {
        // Jika data siswa tidak ditemukan, tampilkan pesan error
        echo '<div class="alert alert-danger mt-3">Data siswa tidak ditemukan!</div>';
    }
} else {
    // Jika ID siswa tidak tersedia, tampilkan pesan error
    echo '<div class="alert alert-danger mt-3">ID siswa tidak valid!</div>';
}
?>
