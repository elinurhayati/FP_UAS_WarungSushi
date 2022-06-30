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

<!DOCTYPE html> <!--Tag pembuka HTML-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Judul laman-->
	<title> HOME KASIR</title>
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
					<!--Icon logo warung sushi-->
					<img class="img_login" src="sushi.png">
					<div class="logo-name"> Warung Sushi</div>
				</div>
				<!--Icon Menu-->
				<i class='bx bx-menu' id="btn-menu"></i>
			</div>

			<!--Navigasi bar yang berisi menu-menu-->
			<ul class="nav">
				<!--Menu dashboard kasir-->
				<li>
					<!--Ketika diklik akan diarahkan ke file dashboard_kasir.php-->
					<a class="active" href="dashboard_kasir.php">
						<!--Icon Nav-->
						<i class='bx bx-home'></i>
						<span class="link_name"> Dashboard</span>
					</a>
					<span class="tooltip"> Dashboard</span>
				</li>

				<!--Menu kelola order-->
				<li>
					<!--Ketika diklik akan diarahkan ke file orders.php-->
					<a href="orders.php">
						<!--Icon Nav-->
						<i class='bx bx-dish'></i>
						<span class="link_name"> Orders</span>
					</a>
					<span class="tooltip"> Orders</span>
				</li>

				<!--Menu cetak nota-->
				<li>
					<!--Ketika diklik akan diarahkan ke file cetak_nota.php-->
					<a href="cetak_nota.php">
						<!--Icon Nav-->
						<i class='bx bx-file'></i>
						<span class="link_name"> Cetak Nota</span>
					</a>
					<span class="tooltip"> Cetak Nota</span>
				</li>
				
				<!--Menu logout kasir-->
				<li>
					<!--Ketika diklik akan diarahkan ke file login_kasir.php-->
					<a href="login_kasir.php">
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
				<?php echo "<h1>Selamat Datang Kasir " . $_SESSION['username'] ."!". "</h1>"; ?>
				<!--Waktu login-->
				<?php echo date('D - m - Y'); ?> 
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
</html><!--Tag penutp HTML-->
