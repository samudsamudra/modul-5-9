<?php
session_start();
// Lakukan koneksi ke database
include "koneksi.php";

// Jika tombol login ditekan
if(isset($_POST['login'])) {
    // Ambil nilai-nilai yang dikirim melalui form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buat query untuk mencari petugas berdasarkan username dan password
    $query = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($cihuy, $query);

    // Periksa apakah data petugas ditemukan
    if(mysqli_num_rows($result) > 0) {
        // Jika ditemukan, simpan data petugas ke dalam session
        $petugas = mysqli_fetch_assoc($result);
        $_SESSION['status_login'] = true;
        $_SESSION['id_petugas'] = $petugas['id_petugas'];
        $_SESSION['nama_petugas'] = $petugas['nama_petugas'];
        $_SESSION['level'] = $petugas['level'];

        // Redirect ke halaman dashboard petugas
        header("Location: home_petugas.php");
        exit();
    } else {
        // Jika tidak ditemukan, tampilkan pesan error dan kembali ke halaman login
        echo "<script>alert('Username atau password salah. Silakan coba lagi.'); window.location='login_petugas.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Login Petugas</title>
</head>
<body>
    <div class="row" style="margin-top:50px;">
        <div class="col-md"></div>
        <div class="col-md rounded bg-light" style="box-shadow: 4px 4px 5px -4px;padding:10px">
            <form action="" method="post">
                <h3 align="center">LOGIN Petugas</h3>
                Username:
                <input type="text" name="username" value="" class="form-control">
                Password:
                <input type="password" name="password" class="form-control"><br>
                <center><input type="submit" name="login" class="btn btn-success" value="LOGIN"></center>
            </form>
        </div>
        <div class="col-md"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
