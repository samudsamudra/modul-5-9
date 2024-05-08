<?php
// Memeriksa apakah parameter ID siswa tersedia
if(isset($_GET['id'])){
    // Mengambil ID siswa dari parameter URL
    $id_siswa = $_GET['id'];

    // Melakukan koneksi ke database
    include "koneksi.php";

    // Menghapus data siswa berdasarkan ID
    $hapus_siswa = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = '$id_siswa'");

    // Jika penghapusan berhasil
    if($hapus_siswa){
        // Redirect kembali ke halaman tampil_siswa.php
        header("Location: tampil_siswa.php");
        exit(); // Menghentikan eksekusi skrip
    } else {
        // Jika penghapusan gagal, tampilkan pesan kesalahan
        echo "Gagal menghapus data siswa.";
    }
} else {
    // Jika tidak ada parameter ID, tampilkan pesan kesalahan
    echo "Parameter ID tidak ditemukan.";
}
?>
