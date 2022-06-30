<?php
/* Include file koneksi.php untuk menghubungkan file php dg database*/
include 'koneksi.php';

//dibawah ini merupakan query untuk menampilkan data order pada tabel menu
$sql1 = mysqli_query($conn, "SELECT * FROM tb_menu");
$sql2 = mysqli_query($conn, "SELECT * FROM tb_menu");
$sql3 = mysqli_query($conn, "SELECT * FROM tb_menu");

// Mengecek apakah id yang dipilih ada di dalam daftar order
if(!isset($_GET['id']) ){
	header('location: orders.php');
}

// Variabel untuk mengambil data id dari dalam daftar order
$id = $_GET['id'];
// Mengambil data dari database database_warungsushi berdasarkan id order
$mysqli = "SELECT * FROM tb_pesanan WHERE id=$id";
$ambil = mysqli_query($conn, $mysqli);
$row = mysqli_fetch_assoc($ambil); //untuk mengambil baris hasil pada variabel ambil sebagai array asosiatif

// Ketika data yang di-edit tidak ditemukan memunculkan pesan eror
if(mysqli_num_rows($ambil)<1){
	die("Oops... data not found");
}	
?>  

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaleSS=1.0">
	<!--Judul laman-->
	<title> EDIT ORDER </title>
	<!--Import link external css-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--Import link untuk referensi boxicon-->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<!--penggunaan CSS internal-->
	<style>
		.option{
			width: 660px;
			text-align: left;
			padding: 10px ;
			border-radius: 20px;
			outline: none;
			border: none;
			color: black;
			background-color: rgba(254, 189, 89, .5);
			transition: 0.5s;
		}
	</style>
</head>
<body> <!--penggunaan javascript-->
	<script type="text/javascript">
		function hitung(){ //fungsi hitung order mengatur total harga order
			var harga = document.getElementById('harga').value; //memanggil variabel inputan harga menu
			var jumlah = document.getElementById('jumlah').value; //memanggil variabel inputan jumlah pesanan
			var hasil = (harga * jumlah); //harga sama dengan total harga didapatkan dari harga menu dikali banyaknya jumlah pesanan
			document.getElementById('totharga').value = hasil; //menampilkan total harga dari variabel hasil
		}
	</script>
	<div class="body-navbar">
		<!--Mengelompokkan elemen dalam slidebar-->
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
				<div class="title_signup">
					<!--Judul-->
					<h1>EDIT MENU</h1>
				</div>
				<!--dibawah ini merupakan form untuk edit order-->
				<form class="box_signup" action="proses_editorder.php" method="POST"> <!--mengirimkan inputan data formulir yang dikirimkan ke halaman proses edit order-->
					<!--input edit order-->
					<div class="signup_kasir">
						<!--masukkan tanggal baru-->
						<label class="label_signup">Tanggal</label><br>
						<!--memanggil data tanggal berdasarkan id order-->
						<input type="date" class="field_signup" name = "date" id="date" value="<?php echo $row['date']?>"> 
						<input type="hidden" name="id" value="<?php echo $row['id']?>">

						<!--masukkan nama customer baru-->
						<label class="label_signup">Nama Customer</label><br>
						<!--memanggil data nama customer berdasarkan id order-->
						<input type="text" class="field_signup" name = "customer" id="customer" value="<?php echo $row['customer']?>">

						<!--masukkan id produk baru-->
						<label class="label_signup">Id Produk</label><br>
						<div>
							<select name="id_produk" id ="id_produk" class="option" required>
								<option></option>
								<!--memanggil data id produk berdasarkan id produk-->
								<?php
								while($data = mysqli_fetch_array($sql1)){
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									}
									echo "<option value='$data[id_produk]'>$data[id_produk] - $data[kategori]</option>";
								} 
								?>
							</select> <br>
						</div>
						<!--masukkan nama produk atau menu yang baru-->
						<label class="label_signup">Produk</label><br>
						<div>
							<select name="produk" id ="produk" class="option" required>
								<option></option>
								<!--memanggil data nama produk berdasarkan id produk-->
								<?php
								while($data = mysqli_fetch_array($sql2)){
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									}
									echo "<option value='$data[kategori]'>$data[id_produk] - $data[kategori]</option>";
								} 
								?>
							</select> <br>
						</div>

						<!--harga produk atau menu baru-->
						<label class="label_signup">Harga</label>
						<div>
							<select name="harga" id ="harga" class="option" required>
								<option></option>
								<!--memanggil data harga produk berdasarkan id produk-->
								<?php
								while($data = mysqli_fetch_array($sql3)){
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									}
									echo "<option value='$data[harga]'>$data[id_produk] - $data[harga]</option>";
								} 
								?>
							</select> <br>
						</div>

						<!--jumlah produk atau menu yang baru-->
						<label class="label_signup">Jumlah</label>
						<input type="number" class="field_signup" min="1" max="50" name = "jumlah" id="jumlah" value="<?php echo $row['jumlah']?>">

						<!--total harga produk atau menu yang baru-->
						<label class="label_signup">Total Harga</label>
						<input type="text" class="field_signup" name = "totharga" id="totharga" onclick="hitung()" value="<?php echo $row['total_harga']?>"> <!--panggil fungsi hitung ketika di klik total harga-->

						<!--pilih metode pembayaran yang baru-->
						<label class="label_signup">Metode Pembayaran</label><br>
						<select class= "option" name="metode_bayar">
							<option></option>
							<!--terdapat metode tunai dan e-wallet-->
							<option value="Tunai"  class="option" value="<?php echo $row['metode_bayar']?>">Tunai</option>
							<option value="E-Wallet"  class="option" value="<?php echo $row['metode_bayar']?>">E-Wallet</option>
						</select> <br>
						<!--button update untuk mengirimkan inputan user yang baru-->
						<button class="btn" type="submit" name = "submit" class="btn_signup">Update</button>
					</div>
				</form>
				<div> <!--judul-->
					<h1 class="ex">warung sushi</h1>
				</div>
			</div>
		</div>
	</div>
	<script>
		//memilih elemen berdasarkan id #btn-menu 
		let btn_menu = document.querySelector('#btn-menu');
		//memilih elemen berdasarkan id .slidebar
		let slidebar = document.querySelector('.slidebar');

		//function ketika btn_menu diklik maka class slidebar akan muncul / hilang
		btn_menu.onclick = function(){
			slidebar.classList.toggle('active');
		}
	</script>
</body>
</html>