<?php
	/* Include file koneksi.php untuk menghubungkan file php dg database*/
	include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaleSS=1.0">
	<!--Judul laman-->
	<title>LAPORAN TRANSAKSI</title>
	<!--Import link external css-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--Import link untuk referensi boxicon-->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<style type="text/css">
		/*Format tampilan class btnpdf*/
		.btnpdf{
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
		/*Format tampilan class btnexcel*/
		.btnexcel{
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
		/*Format tampilan ketika kursor diarahkan ke class btnexcel*/
		.btnexcel:hover{
			background-color: #900c3f;
			color: white;
		}
		/*Format tampilan ketika kursor diarahkan ke class btnpdf*/
		.btnpdf:hover{
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
				<a href="dashboard_admin.php">
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
				<a href="laporan_transaksi.php" class="active">
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
			<div class="title_signupkasir">
				<h1>DATA TRANSAKSI</h1>
			</div>
			<div>
				<button class="btnpdf" name="reportpdf" href="report_pdf.php" onclick="window.location='report_pdf.php';">Report PDF</button>
				<button class="btnexcel" onclick="window.location='report_excel.php'">Report Excel</button>
			</div>
				

			<div class="addgbr">
				<form method="GET" action="" class="cariapa">
				    <input type="text" class="cari" name ="cari" id="cari" placeholder=" Search..">
				</form>
			</div>
		<div class="order">
	    		<table class = "table_order">
		    		<thead>
		    			<tr> <!--Membuat kolom tabel-->
		    				<th>ID</th>
		    				<th>Tanggal</th>
		    				<th>Customer</th>
		    				<th>Produk</th>
		    				<th>Harga</th>
		    				<th>Jumlah</th>
		    				<th>Total Harga</th>
		    				<th>Metode Bayar</th>
		    			</tr>
		    		</thead>

		    		<tbody> 
		    			<?php
		    				
							
		    			?>
		    		</tbody>
		    		<tbody>
		    			<?php 
		    				//Seleksi kondisi ketika diperoleh keyword pencarian
							if(isset($_GET['cari'])){
								//Variabel untuk menampung keyword pencarian yang telah diperoleh
								$cari = $_GET['cari'];
								//Variabel untuk menampung hasil select tb_pesanan dengan nama yang sesuai dengan keyword pencarian
								$query = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE produk LIKE '%".$_GET['cari']."%'");

								//Menjalankan perulangan ketika berhasil mengambil variabel query & menyimpannya ke dalam bentuk array asosiatif/numerik
								while ($row = mysqli_fetch_array($query)){
		    					//Memanggil data dari tb_pesanan
				                echo "<tr>";
				                echo "<td>".$row['id']."</td>";
				                echo "<td>".$row['date']."</td>";
				                echo "<td>".$row['customer']."</td>";
				                echo "<td>".$row['produk']."</td>";
				                echo "<td>".$row['harga']."</td>";
				                echo "<td>".$row['jumlah']."</td>";
				                echo "<td>".$row['total_harga']."</td>";
				                echo "<td>".$row['metode_bayar']."</td>";
	            			} 
							}
							//Jika tidak diperoleh keyword pencarian, maka akan dilakukan perintah berikut
							else{
	            			//Variabel untuk menampung hasil select seluruh data dari tb_pesanan
		    				$show = mysqli_query($conn, "SELECT * FROM tb_pesanan");

		    				//Menjalankan perulangan ketika berhasil mengambil variabel query & menyimpannya ke dalam bentuk array asosiatif/numerik
		    				while ($row = mysqli_fetch_array($show)){
		    					//Memanggil data dari tb_pesanan
				                echo "<tr>";
				                echo "<td>".$row['id']."</td>";
				                echo "<td>".$row['date']."</td>";
				                echo "<td>".$row['customer']."</td>";
				                echo "<td>".$row['produk']."</td>";
				                echo "<td>".$row['harga']."</td>";
				                echo "<td>".$row['jumlah']."</td>";
				                echo "<td>".$row['total_harga']."</td>";
				                echo "<td>".$row['metode_bayar']."</td>";
	            			}
	            			}
		    			?>
		    		</tbody>
		    		
	    		</table>
		</div>
	</div>
	</div>
</div>
	<script>
		let btn_menu = document.querySelector('#btn-menu');
		let slidebar = document.querySelector('.slidebar');

		btn_menu.onclick = function(){
			slidebar.classList.toggle('active');
		}
	</script>


</body>
</html>
