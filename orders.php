<?php
/* Include file koneksi.php untuk menghubungkan file php dg database*/
include 'koneksi.php';
?>

<!DOCTYPE html><!--Tag pembuka HTML-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Judul laman-->
	<title> HOME </title>
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
					<!--Icon Logo warung sushi-->
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
					<a href="dashboard_kasir.php">
						<!--Icon Nav-->
						<i class='bx bx-home'></i>
						<span class="link_name"> Dashboard</span>
					</a>
					<span class="tooltip"> Dashboard</span>
				</li>

				<!--Menu kelola order-->
				<li>
					<!--Ketika diklik akan diarahkan ke file orders.php-->
					<a href="orders.php" class="active">
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
			<div class = "container_signup">
				<div class="title_signupkasir">
					<!--Judul-->
					<h1>ORDERS</h1>
				</div>
				<!--klik tombol untuk menambahkan pesanan pelanggan-->
				<div class="addgbr">
					<a href="tambah_order.php">
						<img src="add1.png">
					</a>
					<!--field untuk mencari dengan keyword-->
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
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php 
		    				//Query untuk pencarian
							if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
								$query = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE produk LIKE '%".$_GET['cari']."%'");
								while ($row = mysqli_fetch_array($query)){
		    						//Pemanggilan data dari tabel pesanan
									echo "<tr>";
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['date']."</td>";
									echo "<td>".$row['customer']."</td>";
									echo "<td>".$row['produk']."</td>";
									echo "<td>".$row['harga']."</td>";
									echo "<td>".$row['jumlah']."</td>";
									echo "<td>".$row['total_harga']."</td>";
									echo "<td>".$row['metode_bayar']."</td>";
									echo "<td>";
				                	//Mengarahkan button edit ke laman edit_order.php
									echo "<a href='edit_order.php?id=".$row['id']."' class= 'btn_editkasir' src='edit.png'>EDIT</a>&ensp;";
				                	//Mengarahkan button delete ke laman delete_order.php
									echo "<a href='delete_order.php?id=".$row['id']."' class= 'btn_hapuskasir'>HAPUS </a>";
									echo "</td>";
									echo "</tr>";
								} 
							}else{
	            				//Queri untuk memanggil seluruh data dalam tabel
								$show = mysqli_query($conn, "SELECT * FROM tb_pesanan");
								while ($row = mysqli_fetch_array($show)){
		    					//Pemanggilan data dari tabel pemesanan
									echo "<tr>";
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['date']."</td>";
									echo "<td>".$row['customer']."</td>";
									echo "<td>".$row['produk']."</td>";
									echo "<td>".$row['harga']."</td>";
									echo "<td>".$row['jumlah']."</td>";
									echo "<td>".$row['total_harga']."</td>";
									echo "<td>".$row['metode_bayar']."</td>";
									echo "<td>";
				               		//Mengarahkan button edit ke laman edit_order.php
									echo "<a href='edit_order.php?id=".$row['id']."' class= 'btn_editkasir' src='edit.png'>EDIT</a>&ensp;";
				                	//Mengarahkan button delete ke laman delete_order.php
									echo "<a href='delete_order.php?id=".$row['id']."' class= 'btn_hapuskasir'>HAPUS </a>";
									echo "</td>";
									echo "</tr>";
								}
							}
							?>
						</tbody>
					</table>
				</div>
				<div><!--judul-->
					<h1 class="ex">warung sushi</h1>
				</div>
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