<?php
	/* Include file koneksi.php untuk menghubungkan file php dg database*/
	include 'koneksi.php';
	//Memulai eksekusi session pada server kemudian menyimpannya di browser
	session_start();
	//Seleksi kondisi apakah session username telah dideklarasikan sebelumnya
	if (!isset($_SESSION['username'])) {
		header("Location: ");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaleSS=1.0">
	<!--Judul laman-->
	<title> HOME ADMIN</title>
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
				<a class="active" href="dashboard_admin.php">
					<!--Icon Nav-->
					<i class='bx bx-home'></i>
					<span class="link_name"> Dashboard</span>
				</a>
				<span class="tooltip"> Dashboard</span>
			</li>
			<!--Menu kelola menu-->
			<li>
				<!--Ketika diklik akan diarahkan ke file kelola_menu.php-->
				<a href="kelola_menu.php">
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
		<div class="content"> 
			<!--Sambutan untuk admin yang login-->
			<?php echo "<h1>Selamat Datang Admin " . $_SESSION['username'] ."!". "</h1>"; ?>
			<!--Waktu login-->
			<?php echo date('d-m-Y h:i:s'); ?>
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
