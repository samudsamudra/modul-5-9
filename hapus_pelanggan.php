<?php
// Lakukan koneksi ke database
include "koneksi.php";

// Periksa apakah parameter id_pelanggan telah dikirim melalui URL
if(isset($_GET['id'])) {
    // Ambil nilai id_pelanggan dari URL
    $id_pelanggan = $_GET['id'];

    $delete = mysqli_query($cihuy, "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");

    // Periksa apakah proses penghapusan berhasil
    if($delete) {
        // Jika berhasil, arahkan kembali ke halaman tampil_pelanggan.php
        echo "<script>alert('Pelanggan berhasil dihapus'); window.location='tampil_pelanggan.php';</script>";
        exit(); // Hentikan eksekusi skrip setelah melakukan pengalihan halaman
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "<script>alert('Gagal menghapus pelanggan'); window.location='tampil_pelanggan.php';</script>";
    }
} else {
    // Jika parameter id_pelanggan tidak tersedia, tampilkan pesan kesalahan
    echo "<script>alert('ID pelanggan tidak tersedia'); window.location='tampil_pelanggan.php';</script>";
}
?>
