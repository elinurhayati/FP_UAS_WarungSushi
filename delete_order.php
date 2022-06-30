<?php
/* Include file koneksi.php untuk menghubungkan file php dg database*/
include 'koneksi.php';
//Mengecek apakah id yang dipilih ada di dalam daftar order
if(isset($_GET['id']) ){
	// Variabel id untuk mengambil data id dari dalam daftar order
	$id = $_GET['id'];
	// Mengambil data dari database database_warungsushi tabel tb_pesanan berdasarkan id order
	$delete = mysqli_query($conn, "DELETE FROM tb_pesanan WHERE id=$id");
	// Seleksi kondisi ketika proses delete order berhasil
	if($delete) {
		// Menampilkan pesan sukses
		echo "<script> alert ('Data successfully deleted'); </script>";
		// Mengarahkan kembali ke laman order
		header('Location: orders.php');
	} else {
		// Menampilkan pesan gagal delete order
		die("Oops... Data failed to delete");
	}
// Menampilkan pesan bahwa user tidak memiliki akses untuk delete order
} else{
	die("Sorry... access denied");
}	
?>