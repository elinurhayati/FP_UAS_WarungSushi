<?php
	/* Include file koneksi.php untuk menghubungkan file php dg database*/
	include 'koneksi.php';


	//Ketika button sukses diklik
	if(isset($_POST['sukses'])){
		/* Fungsi untuk insert data ke tabel */
		$submit = mysqli_query($conn, "INSERT INTO tb_sukses(date, customer, produk, harga, jumlah, total_harga, metode_bayar) VALUES ('$_POST[date]', '$_POST[customer]', '$_POST[produk]', '$_POST[harga]', '$_POST[jumlah]', '$_POST[totharga]', '$_POST[metode]')");

		/* Ketika submit berhasil*/
		if($submit){
			echo "<script> 
					alert('Registration data successfully saved');
					document.location = 'orders.php';
				</script>";
		}
		/* Ketika submit gagal*/
		else{
			echo "<script> 
					alert('Oops Registration data failed to save');
					document.location = 'orders.php';
				</script>";
		}
	}	

?>
