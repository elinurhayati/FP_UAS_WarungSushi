<?php
	/* Include file koneksi.php untuk menghubungkan file php dg database*/
	include 'koneksi.php';

	// Query utk select data dari tb_menu
	$produk = mysqli_query($conn, "SELECT * FROM tb_menu");
	// Melakukan perulangan ketika dilakukan pengambilan / SELECT data dari tb_menu
	while($row = mysqli_fetch_array($produk)){
		$nama_produk[] = $row['kategori'];
		// Query untuk mengambil jumlah produk terjual berdasarkan id_produk dari database
		$query = mysqli_query($conn, "SELECT sum(jumlah) as jumlah from tb_pesanan WHERE id_produk = '".$row['id_produk']."'");
			$row = $query->fetch_array();
			// Mengambil nilai dari database dalam array
			$jumlah_produk[] = $row['jumlah'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaleSS=1.0">
	<!--Judul laman-->
	<title>GRAFIK PENJUALAN</title>
	<!--Import link external css-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--Import link untuk referensi boxicon-->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<!--Import link chart.js untuk grafik-->
	<script type="text/javascript" src="Chart.js"></script>
	<!--Inline CSS-->
	<style type="text/css">
		/*Format tampilan class btnbar*/
		.btnbar{
			background-color: white;
			font-weight: bold;
			width: 100px;
			height: 30px;
			left: 5%;
			border-radius: 8px 8px;
			cursor: pointer;
			box-shadow: 2px 2px 2px grey;
			top: 16%;
			position: absolute;
		}
		/*Format tampilan class btnline*/
		.btnline{
			background-color: white;
			font-weight: bold;
			width: 100px;
			height: 30px;
			left: 42%;
			border-radius: 8px 8px;
			cursor: pointer;
			box-shadow: 2px 2px 2px grey;
			top: 16%;
			position: absolute;
		}
		/*Format tampilan ketika kursor diarahkan ke class btnbar*/
		.btnbar:hover{
			background-color: #900c3f;
			color: white;
		}
		/*Format tampilan ketika kursor diarahkan ke class btnline*/
		.btnline:hover{
			background-color: #900c3f;
			color: white;
		}
		/*Format tampilan class btnpie*/
		.btnpie{
			background-color: white;
			font-weight: bold;
			width: 100px;
			height: 30px;
			left: 80%;
			border-radius: 8px 8px;
			cursor: pointer;
			box-shadow: 2px 2px 2px grey;
			top: 16%;
			position: absolute;
		}
		/*Format tampilan class btndonat*/
		.btndonat{
			background-color: #900c3f;
			color: white;
			font-weight: bold;
			width: 115px;
			height: 30px;
			left: 118%;
			border-radius: 8px 8px;
			cursor: pointer;
			box-shadow: 2px 2px 2px grey;
			top: 16%;
			position: absolute;
		}
		/*Format tampilan ketika kursor diarahkan ke class btnpie*/
		.btnpie:hover{
			background-color: #900c3f;
			color: white;
		}
	</style>
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
				<a href="laporan_transaksi.php" >
					<!--Icon Nav-->
					<i class='bx bxs-report'></i>
					<span class="link_name"> Laporan Transaksi</span>
				</a>
				<span class="tooltip"> Laporan Transaksi</span>
			</li>
			<!--Menu grafik penjualan-->
			<li>
				<!--Ketika diklik akan diarahkan ke file grafik.php-->
				<a href="grafik.php" class="active">
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
		<div class="container_signup">
			<div class="title_signupkasir">
				<h1>GRAFIK PENJUALAN</h1>
			</div>
			<div class="wrap">
				<ul>
					<li>
						<a >
							<!--Button bar chart ketika dikil maka akan diarahkan ke file bar.php-->
							<button class="btnbar" name="btnbar" onclick="window.location='grafik.php';">Bar Chart</button>
						</a>
						<a>
							<!--Button line chart ketika dikil maka akan diarahkan ke file line.php-->
							<button class="btnline" name="btnline" onclick="window.location='line.php';">Line Chart</button>
						</a>
						<a>
							<!--Button pie chart ketika dikil maka akan diarahkan ke file pie.php-->
							<button class="btnpie" name="btnpie" onclick="window.location='pie.php';">Pie Chart</button>
						</a>
						<a>
							<!--Button doughnut chart ketika dikil maka akan diarahkan ke file doughnut.php-->
							<button class="btndonat" name="btndonat" onclick="window.location='doughnut.php';">Doughnut Chart</button>
						</a>
					</li>
				</ul>
			</div>
				
			</div class = "grafik">
				<!--Field Chart-->
				<div style ="width : 800px; height:800px">
					<canvas id="myChart"></canvas>
				</div>
				<script>
					// Variabel utk membuat grafik 2d di canvas dengan id myChart
					var ctx = document.getElementById("myChart").getContext('2d');
					// Chart akan ditampilkan dalam tipe doughnut 
					var myChart = new Chart(ctx, {
						type: 'doughnut',
						// Data dari chart yang akan ditampilkan
						data: {
							// Menampilkan data nama produk
							labels: <?php echo json_encode($nama_produk); ?>,
							datasets: [{
								label: 'Jumlah Produk Terjual',
								 // Memanggil variabel yang akan dijadikan isi chart
								data: <?php echo json_encode($jumlah_produk); ?>,
								//Mengatur warna background dari doughnut
								backgroundColor: ['rgb(255, 179, 255, 0.5)',
													'rgb(255, 170, 128, 0.5)',
													'rgb(179, 255, 179, 0.5)',
													'rgb(163, 163, 194, 0.5)',
													'rgb(217, 179, 140, 0.5)'],
								//Mengatur warna border dari doughnut
								borderColor: ['rgb(255, 77, 255, 1)',
													'rgb(255, 153, 102, 1)',
													'rgb(0, 179, 0, 1)',
													'rgb(117, 117, 163, 1)',
													'rgb(204, 153, 102, 1)'],
								//Mengatur lebar border dari border  doughnut
								borderWidth: 2
							}]
						},
						// Options untuk mengatur format tampilan chart
						options: {
							// Mengatur format judul bar chart
							title : { 
								display : true,
								text : "GRAFIK PENJUALAN WARUNG SUSHI"
							},
							// Konfigurasi skala chart
							scales: {
							}
						}
					});
				</script>
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
