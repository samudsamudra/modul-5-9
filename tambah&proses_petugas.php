<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h3 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="form-container">
                    <h3 class="text-center mb-4">Tambah TUGAS LAH NUGAS</h3>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-3">
                            <label for="nama_petugas" class="form-label">Nama Petugas:</label>
                            <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" value="<?php if(isset($_POST['nama_petugas'])) echo $_POST['nama_petugas']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level:</label>
                            <select name="level" id="level" class="form-control">
                                <option value="pengawas">Pengawas</option>
                                <option value="pengelola">Pengelola</option>
                                <option value="entitas_lain">entitas_lain</option>
                                <option value="open_joki_popIce">open_joki_popIce</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="simpan" class="btn btn-primary btn-block">Tambah Petugas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<?php
if($_POST){
    $nama_petugas=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];
    
    if(empty($nama_petugas)){
        echo "<script>alert('Nama petugas tidak boleh kosong');</script>";
    } elseif(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');</script>";
    } elseif(empty($password)){
        echo "<script>alert('Password tidak boleh kosong');</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($cihuy,"INSERT INTO petugas (nama_petugas, username, password, level) VALUES ('".$nama_petugas."','".$username."','".$password."','".$level."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan petugas');</script>";
        } else {
            echo "<script>alert('Gagal menambahkan petugas');</script>";
        }
    }
}
?>
