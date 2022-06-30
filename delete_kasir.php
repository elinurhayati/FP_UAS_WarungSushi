<?php
	/* Include file koneksi.php untuk menghubungkan file php dg database*/
	include 'koneksi.php';

	//Seleksi kondisi ketika tidak diperoleh id data dari baris yang akan diedit
	if(isset($_GET['id']) ){

	    //Variabel untuk menampung id kasir yang telah diperoleh
		$id = $_GET['id'];
;
		//Variabel untuk menampung pengiriman perintah query delete ke database mysql
		//Dijalankan perintah delete dari tb_kasir berdasarkan id yang diperoleh
		$delete = mysqli_query($conn, "DELETE FROM tb_kasir WHERE id=$id");

		//Seleksi kondisi ketika proses delete berhasil
    	if($delete) {
	        // Menampilkan pesan sukses delete
	        echo "<script> alert ('Data successfully deleted'); </script>";
	        // Mengarahkan kembali ke laman kelola_kasir.php
	        header('Location: kelola_kasir.php');
    	} else {
	        // Menampilkan pesan gagal delete
	        die("Oops... Data failed to delete");
   		}

	} 
	//Ketika tidak diperoleh id data dari baris yang akan diedit
	else{
		//Menampilkan pesan error
		die("Sorry... access denied");
	}	

?>
