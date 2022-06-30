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
	<title>KELOLA KASIR</title>
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
				<a href="kelola_kasir.php" class="active">
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
			<div class="title_signupkasir">
				<h1>DATA KASIR</h1>
			</div>
			<div class="addgbr">
				<!--Ketika diklik maka akan mengarahkan ke file tambah_kasir.php-->
				<a href="tambah_kasir.php">
					<!--Source gambar logo tambah-->
					<img src="add1.png">
				</a>
				<!--Form untuk input pencarian-->
				<form method="GET" action="" class="cariapa">
				    <input type="text" class="cari" name ="cari" id="cari" placeholder=" Search..">
				</form>
			</div>
		<div class="">
				<!--Tabel yang berisi data kasir-->
	    		<table class = "table_kasir">
	    			<!--Mengatur header tabel-->
		    		<thead>
		    			<!--Membuat nama kolom tabel-->
		    			<tr> 
		    				<th>ID</th>
		    				<th>Nama</th>
		    				<th>Alamat</th>
		    				<th>Email</th>
		    				<th>Username</th>
		    				<th>Password</th>
		    				<th>Aksi</th>
		    			</tr>
		    		</thead>

		    		<!--Mengatur body tabel-->
		    		<tbody>
		    			<?php 
		    				//Seleksi kondisi ketika diperoleh keyword pencarian
							if(isset($_GET['cari'])){
								//Variabel untuk menampung keyword pencarian yang telah diperoleh
								$cari = $_GET['cari'];
								//Variabel untuk menampung hasil select tb_kasir dengan nama yang sesuai dengan keyword pencarian
								$query = mysqli_query($conn, "SELECT * FROM tb_kasir WHERE name LIKE '%".$_GET['cari']."%'");

								//Menjalankan perulangan ketika berhasil mengambil variabel query & menyimpannya ke dalam bentuk array asosiatif/numerik
								while ($row = mysqli_fetch_array($query)){
			    					//Memanggil data dari tb_kasir
					                echo "<tr>";
					                echo "<td>".$row['id']."</td>"; 
					                echo "<td>".$row['name']."</td>";
					                echo "<td>".$row['address']."</td>";
					                echo "<td>".$row['email']."</td>";
					                echo "<td>".$row['username']."</td>";
					                echo "<td>".$row['password']."</td>";
					                echo "<td>";
					                //Mengarahkan elemen edit ke dalam file edit_kasir.php
					                echo "<a href='edit_kasir.php?id=".$row['id']."' class= 'btn_editkasir' src='edit.png'>EDIT</a>&ensp;";
					                //Mengarahkan elemen delete ke dalam file delete_kasir.php
					                echo "<a href='delete_kasir.php?id=".$row['id']."' class= 'btn_hapuskasir'>HAPUS</a>";
					                echo "</td>";
					                echo "</tr>";
	            			} 
							}
							//Jika tidak diperoleh keyword pencarian, maka akan dilakukan perintah berikut
							else{
	            				//Variabel untuk menampung hasil select seluruh data dari tb_kasir 
			    				$show = mysqli_query($conn, "SELECT * FROM tb_kasir");

			    				//Menjalankan perulangan ketika berhasil mengambil variabel show & menyimpannya ke dalam bentuk array asosiatif/numerik
			    				while ($row = mysqli_fetch_array($show)){
			    					//Memanggil data dari tb_kasir
					                echo "<tr>";
					                echo "<td>".$row['id']."</td>"; 
					                echo "<td>".$row['name']."</td>";
					                echo "<td>".$row['address']."</td>";
					                echo "<td>".$row['email']."</td>";
					                echo "<td>".$row['username']."</td>";
					                echo "<td>".$row['password']."</td>";
					                echo "<td>";
					                //Mengarahkan elemen edit ke dalam file edit_kasir.php
					                echo "<a href='edit_kasir.php?id=".$row['id']."' class= 'btn_editkasir' src='edit.png'>EDIT</a>&ensp;";
					                //Mengarahkan elemen delete ke dalam file delete_kasir.php
					                echo "<a href='delete_kasir.php?id=".$row['id']."' class= 'btn_hapuskasir'>HAPUS</a>";
					                echo "</td>";
					                echo "</tr>";
	            			}
	            			}
		    			?>
		    		</tbody>
		    		
	    		</table>
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
