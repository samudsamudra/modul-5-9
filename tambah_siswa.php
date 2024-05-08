<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 class="mt-3">Selamat datang di sekolah AWOKAWOK</h3>
        <form id="siswaForm" action="" method="post">
            <div class="mb-3">
                <label for="namaSiswa" class="form-label">Nama Siswa:</label>
                <input type="text" name="nama_siswa" id="namaSiswa" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tanggalLahir" class="form-label">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" id="tanggalLahir" class="form-control">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select name="gender" id="gender" class="form-select">
                    <option></option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <select name="id_kelas" id="kelas" class="form-select">
                    <option></option>
                    <?php
                    include "koneksi.php";
                    $qry_kelas = mysqli_query($conn, "SELECT * FROM kelas");
                    while($kelas = mysqli_fetch_array($qry_kelas)){
                        echo '<option value="'.$kelas['id_kelas'].'">'.$kelas['nama_kelas'].'</option>';    
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $nama_siswa = $_POST['nama_siswa'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $gender = $_POST['gender'];
            $alamat = $_POST['alamat'];
            $id_kelas = $_POST['id_kelas'];

            // Masukkan proses insert ke dalam database di sini
            include "koneksi.php";
            $insert = mysqli_query($conn, "INSERT INTO siswa (nama_siswa, tanggal_lahir, gender, alamat, id_kelas) VALUES ('$nama_siswa', '$tanggal_lahir', '$gender', '$alamat', '$id_kelas')");
            if($insert){
                echo '<div class="alert alert-success mt-3">Data berhasil terkirim!</div>';
            } else {
                echo '<div class="alert alert-danger mt-3">Gagal mengirim data!</div>';
            }
        }
        ?>

        <h3 class="mt-5">Tampil Siswa</h3>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA SISWA</th>
                    <th>TANGGAL LAHIR</th>
                    <th>ALAMAT</th>
                    <th>GENDER</th>
                    <th>KELAS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "koneksi.php";
                $qry_siswa = mysqli_query($conn, "SELECT siswa.*, kelas.nama_kelas FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
                $no = 0;
                while($siswa = mysqli_fetch_array($qry_siswa)) {
                    $no++;
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $siswa['nama_siswa'] ?></td>
                    <td><?= $siswa['tanggal_lahir'] ?></td>
                    <td><?= $siswa['alamat'] ?></td>
                    <td><?= $siswa['gender'] ?></td>
                    <td><?= $siswa['nama_kelas'] ?></td>
                    <td>
                        <a href="ubah_siswa.php?id=<?= $siswa['id_siswa'] ?>" class="btn btn-success">Rubah</a> | 
                        <a href="?hapus=<?= $siswa['id_siswa'] ?>" onclick="return confirm('Emangnya kau yakin mau hapus le?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>

        <?php
        if(isset($_GET['hapus'])){
            $id_siswa = $_GET['hapus'];
            $hapus = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");
            if($hapus){
                echo '<div class="alert alert-success mt-3">Data berhasil dihapus!</div>';
            } else {
                echo '<div class="alert alert-danger mt-3">Gagal menghapus data!</div>';
            }
        }
        ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
