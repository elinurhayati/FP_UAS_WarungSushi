<?php
	/* Include file koneksi.php untuk menghubungkan file php dg database*/
	include 'koneksi.php';
	
	//Seleksi kondisi ketika tidak diperoleh id data dari baris yang akan diedit
	if(!isset($_GET['id']) ){
		//Mengarahkan kembali user ke laman kelola_kasir.php
	    header('location: kelola_kasir.php');
	}

	//Variabel untuk menampung id kasir yang telah diperoleh
	$id = $_GET['id'];
	//Variabel untuk menampung hasil select seluruh data dari tb_kasir dengan id=$id(id yang telah diperoleh)
	$mysqli = "SELECT * FROM tb_kasir WHERE id=$id";
	//Variabel untuk menampung pengiriman perintah query ke database mysql
	$ambil = mysqli_query($conn, $mysqli);
	//Variabel untuk pengambilan baris hasil sebagai array asosiatif
	$row = mysqli_fetch_assoc($ambil);

	//Seleksi kondisi ketika data yang akan diedit tidak ditemukan/kurang dari 1 
	if(mysqli_num_rows($ambil)<1){
		//Menampilkan pesan bahwa data tidak ditemukan
	    die("Oops... data not found");
	}	
	
?>  

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaleSS=1.0">
	<!--Judul laman-->
	<title>EDIT KASIR</title>
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
			<!--Judul-->
			<div class="title_signup">
				<h1> EDIT KASIR</h1>
			</div>
			<!--Form tambah kasir dengan method POST-->
			<form class="box_signup" action="proses_editkasir.php" method="POST">
				<div class="signup_kasir">
					<!--Input nama kasir-->
					<div>
						<label class="label_signup">Nama</label>
						<!--Field input dengan penyertaan value berupa nama dari data yang akan diedit-->
				    	<input type="text" class="field_signup" name = "nama" id="nama" value="<?php echo $row['name']?>">
				    	<!--Mengirim data id tanpa ditampilkan dan memengaruhi bentuk form yang ada-->
				    	<input type="hidden" name="id" value="<?php echo $row['id']?>">
					</div>

					<!--Input alamat kasir-->
					<div>
						<label class="label_signup">Alamat</label>
						<!--Field input dengan penyertaan value berupa address dari data yang akan diedit-->
				   		<input type="text" class="field_signup" name = "address" id="address" value="<?php echo $row['address']?>">
					</div>

					<!--Input email kasir-->
					<div>
						<label class="label_signup">Email</label>
						<!--Field input dengan penyertaan value berupa email dari data yang akan diedit-->
				    	<input type="text" class="field_signup" name = "email" id="email" value="<?php echo $row['email']?>">
					</div>

					<!--Input username kasir-->
					<div>
						<label class="label_signup">Username</label>
						<!--Field input dengan penyertaan value berupa username dari data yang akan diedit-->
				    	<input type="text" class="field_signup" name = "username" id="username" value="<?php echo $row['username']?>">
					</div>

					<!--Input password kasir-->
					<div>
						<label class="label_signup">Password</label>
						<!--Field input dengan penyertaan value berupa password dari data yang akan diedit-->
				    	<input type="text" class="field_signup" name = "password" id="password" value="<?php echo $row['password']?>">
						
					</div>
				    <div>
						<!--Button reset untuk mengosongkan field inputan-->
						<button class="btn" type="reset" name ="reset" class="btn_signup">Reset</button>
						<!--Button update untuk mengupdate data -->						
						<button class="btn" type="submit" name ="update" class="btn_signup">Update</button>
					</div>
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
