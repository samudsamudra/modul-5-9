<?php
if($_POST){
    $nama_kelas = $_POST['nama_kelas'];
    $kelompok = $_POST['kelompok'];
    if(empty($nama_kelas)){
        echo "<script>alert('Nama kelas tidak boleh kosong');</script>";
    } elseif(empty($kelompok)){
        echo "<script>alert('Kelompok tidak boleh kosong');</script>";
    } else {
        
        $conn = mysqli_connect('localhost', 'root', '', 'lagi');
        
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        
        $query = "INSERT INTO kelas (nama_kelas, kelompok) VALUES ('$nama_kelas', '$kelompok')";
        
        
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Sukses menambahkan kelas');location.href='tambah_kelas.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan kelas');</script>";
        }

        
        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
    <!-- Bootstrap CSS WOKWOK (dahlah) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Tambah Kelas</h3>
        <form action="proses_tambah_kelas.php" method="post" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas:</label>
                <input type="text" name="nama_kelas" id="nama_kelas" class="form-control">
            </div>
            <div class="mb-3">
                <label for="kelompok" class="form-label">Kelompok:</label>
                <input type="text" name="kelompok" id="kelompok" class="form-control">
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Tambah Kelas</button>
        </form>
    </div>

    <!-- Bootstrap JS cihuyyyyyyy -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        function validateForm() {
            var nama_kelas = document.getElementById("nama_kelas").value;
            var kelompok = document.getElementById("kelompok").value;
            if (nama_kelas == "") {
                alert("Nama kelas tidak boleh kosong");
                return false;
            }
            if (kelompok == "") {
                alert("Kelompok tidak boleh kosong");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
