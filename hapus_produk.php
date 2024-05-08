<?php
include "koneksi.php";

if(isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    $delete = mysqli_query($cihuy, "DELETE FROM produk WHERE id_produk = '$id_produk'");

    if($delete) {
        echo "<script>alert('Produk berhasil dihapus'); window.location='tampil_produk.php';</script>";
        exit(); 
    } else {
        echo "<script>alert('Gagal menghapus produk'); window.location='tampil_produk.php';</script>";
    }
} else {
  
    echo "<script>alert('ID produk tidak tersedia'); window.location='tampil_produk.php';</script>";
}
?>
