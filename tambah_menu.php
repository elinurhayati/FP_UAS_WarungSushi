<?php
	/* Include file koneksi.php untuk menghubungkan file php dg database*/
	include 'koneksi.php';
	//Mematikan semua laporan error 
	error_reporting(0);

	//Ketika button submit diklik
	if(isset($_POST['submit'])){
		//Variabel untuk menampung hasil insert tb_menu
		//Melakukan insert kategori, menu, gambar, harga, dan status ke dalam tb_menu
		$submit = mysqli_query($conn, "INSERT INTO tb_menu(kategori, menu, gambar, harga, status) VALUES ('$_POST[kategori]', '$_POST[menu]', '$_POST[gambar]', '$_POST[harga]', '$_POST[status]')");

		//Seleksi kondisi ketika submit berhasil
		if($submit){
			//Menampilkan alert data sukses tersimpan dan mengarahkan kembali ke file kelola_menu.php
			echo "<script> 
					alert('Registration data successfully saved');
					document.location = 'kelola_menu.php';
				</script>";
		}
		// Ketika submit gagal
		else{
			//Menampilkan alert data gagal tersimpan dan mengarahkan kembali ke file kelola_menu.php
			echo "<script> 
					alert('Oops Registration data failed to save');
					document.location = 'kelola_menu.php';
				</script>";
		}
	}
	mysqli_close($conn);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaleSS=1.0">
	<!--Judul laman-->
	<title>TAMBAH MENU</title>
	<!--Import link external css-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--Import link untuk referensi boxicon-->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="body-navbar">
	<!--Mengelompokkan elemen dalam sidebar-->
	<div class="slidebar">
		<div class="logo-content">
			<div class="logo">
				<!--Icon log warung sushi-->
				<img class="img_login" src="sushi.png">
				<div class="logo-name"> Warung Sushi</div>
			</div>
			<!--Icon Menu-->
			<i class='bx bx-menu' id="btn-menu"></i>
		</div>

		<!--Navigasi bar yang berisi menu-menu-->
		<ul class="nav">
			<!--Menu dashboard admin-->
			<li> 
				<!--Ketika diklik akan diarahkan ke file dashboard_admin.php-->
				<a  href="dashboard_admin.php">
					<!--Icon Nav-->
					<i class='bx bx-home'></i>
					<span class="link_name"> Dashboard</span>
				</a>
				<span class="tooltip"> Dashboard</span>
			</li>
			<!--Menu kelola menu-->
			<li>
				<!--Ketika diklik akan diarahkan ke file kelola_menu.php-->
				<a href="kelola_menu.php" class="active">
					<!--Icon Nav-->
					<i class='bx bx-dish'></i>
					<span class="link_name"> Kelola Menu</span>
				</a>
				<span class="tooltip"> Kelola Menu</span>
			</li>
			<!--Menu kelola kasir-->
			<li>
				<!--Ketika diklik akan diarahkan ke file kelola_kasir.php-->
				<a href="kelola_kasir.php">
					<!--Icon Nav-->
					<i class='bx bx-user-circle'></i>
					<span class="link_name"> Kelola Kasir</span>
				</a>
				<span class="tooltip"> Kelola Kasir</span>
			</li>
			<!--Menu laporan transaksi-->
			<li>
				<!--Ketika diklik akan diarahkan ke file laporan_transaksi.php-->
				<a href="laporan_transaksi.php">
					<!--Icon Nav-->
					<i class='bx bxs-report'></i>
					<span class="link_name"> Laporan Transaksi</span>
				</a>
				<span class="tooltip"> Laporan Transaksi</span>
			</li>
			<!--Menu grafik penjualan-->
			<li>
				<!--Ketika diklik akan diarahkan ke file grafik.php-->
				<a href="grafik.php">
					<!--Icon Nav-->
					<i class='bx bx-line-chart'></i>
					<span class="link_name"> Grafik</span>
				</a>
				<span class="tooltip"> Grafik</span>
			</li>
			<!--Menu logout admin-->
			<li>
				<!--Ketika diklik akan diarahkan ke file login_admin.php-->
				<a href="login_admin.php">
					<!--Icon Nav-->
					<i class='bx bx-log-out'></i>
					<span class="link_name"> Logout</span>
				</a>
				<span class="tooltip"> Logout</span>
			</li>
		</ul>
	</div>

	<!--Home content-->
	<div class="home-content">
		<div class = "container_signup">
			<!--Judul-->
			<div class="title_signup">
				<h1>TAMBAH MENU</h1>
			</div>
			<!--Form tambah menu dengan method POST-->
			<form class="box_signup" action="" method="POST">
				<div class="signup_kasir">
					<!--Input kategori menu-->
					<label class="label_signup">Kategori</label><br>
					<input type="text" class="field_signup" name = "kategori" id="kategori">

					<!--Input deskripsi menu-->
				    <label class="label_signup">Menu</label>
				    <input type="text" class="field_signup" name = "menu" id="menu">

				    <!--Input gambar menu-->
				    <label class="label_signup">Gambar</label>
				    <input type="file" class="field_signup" name = "gambar" id="gambar" accept="image/*">

				    <!--Input harga menu-->
				    <label class="label_signup">Harga</label>
				    <input type="text" class="field_signup" name = "harga" id="harga">

				    <!--Input status menu menggunakan select option-->
				    <label class="label_signup">Status</label><br>
				    <select class= "field_signup" name="status">
				    	<option></option>
		    			<option value="Tersedia"  class="option">Tersedia</option>
		    			<option value="Habis"  class="option">Habis</option>
		    		</select> <br>

					<!--Button reset untuk mengosongkan field inputan-->
					<button class="btn" type="reset" name = "reset" class="btn_signup">Reset</button>
					<!--Button submit untuk submit field inputan-->					
					<button class="btn" type="submit" name = "submit" class="btn_signup">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
	<script>
		//Memilih elemen berdasarkan id #btn-menu
		let btn_menu = document.querySelector('#btn-menu');
		//Memilih elemen berdasarkan class .slidebar
		let slidebar = document.querySelector('.slidebar');

		//Function ketika btn_menu diklik maka class slidebar akan muncul / hilang
		btn_menu.onclick = function(){
			slidebar.classList.toggle('active');
		}
	</script>


</body>



</html>
