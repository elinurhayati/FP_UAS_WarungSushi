<?php
/* Include file koneksi.php untuk menghubungkan file php dg database*/
include 'koneksi.php';
error_reporting(0); //sebagai kontrol untuk menyembunyikan notifikasi error pada browser

//dibawah ini merupakan query untuk menampilkan data order pada tabel menu
$sql1 = mysqli_query($conn, "SELECT * FROM tb_menu");
$sql2 = mysqli_query($conn, "SELECT * FROM tb_menu");
$sql3 = mysqli_query($conn, "SELECT * FROM tb_menu");

//Ketika button submit di klik
if(isset($_POST['submit'])){
	/* Fungsi untuk insert data order ke tabel */
	$submit = mysqli_query($conn, "INSERT INTO tb_pesanan(date, customer, id_produk, produk, harga, jumlah, total_harga, metode_bayar) VALUES ('$_POST[date]', '$_POST[customer]', '$_POST[id_produk]', '$_POST[produk]', '$_POST[harga]', '$_POST[jumlah]', '$_POST[totharga]', '$_POST[metode]')");

	/* Ketika submit berhasil menampilkan pesan sukses*/
	if($submit){
		echo "<script> 
		alert('Registration data successfully saved');
		document.location = 'orders.php';
		</script>";
	}
	/* Ketika submit gagal menampilkan pesan gagal disimpan*/
	else{
		echo "<script> 
		alert('Oops Registration data failed to save');
		document.location = 'orders.php';
		</script>";
	}
}
?>

<!DOCTYPE html><!--Tag pembuka HTML-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaleSS=1.0">
	<!--Judul laman-->
	<title> TAMBAH ORDER </title>
	<!--Import link external css-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--Import link untuk referensi boxicon-->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<!--Import link untuk referensi jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
				<div class="title_signup">
					<!--Judul-->
					<h1>TAMBAH ORDER</h1>
				</div>
				<!--dibawah ini merupakan form untuk tambah order-->
				<form name = "add" class="box_signup" action="" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"> <!--mengirimkan inputan data formulir yang dikirimkan ke halaman itu sendiri-->
					<!--input order-->
					<div class="signup_kasir">
						<!--masukkan tanggal-->
						<label class="label_signup">Tanggal</label><br>
						<input type="date" class="field_signup" name = "date" id="date">
						<!--masukkan nama customer-->
						<label class="label_signup">Nama Customer</label><br>
						<input type="text" class="field_signup" name = "customer" id="customer">
						<!--masukkan menu yang dipesan-->
						<!--id produk-->
						<label class="label_signup">Id Produk</label><br>
						<div>
							<select name="id_produk" id ="id_produk" class="option" required>
								<option></option>
								<!--mengambil data menu berdasarkan id menu-->
								<?php
								while($data = mysqli_fetch_array($sql1)){
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									}
									//menampilkan data menu berdasaran id menu
									echo "<option value='$data[id_produk]'>$data[id_produk] - $data[kategori]</option>";
								} 
								?>
							</select> <br>
						</div>
						<!--nama produk atau menu-->
						<label class="label_signup">Produk</label><br>
						<div>
							<select name="produk" id ="produk" class="option" required>
								<option></option>
								<!--mengambil data menu berdasarkan id menu-->
								<?php
								while($data = mysqli_fetch_array($sql2)){
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									}
									//menampilkan data menu berdasaran id menu
									echo "<option value='$data[kategori]'>$data[id_produk] - $data[kategori]</option>";
								} 
								?>
							</select> <br>
						</div>
						<!--harga produk atau menu-->
						<label class="label_signup">Harga</label>
						<div>
							<select name="harga" id ="harga" class="option" required>
								<option></option>
								<!--mengambil data menu berdasarkan id menu-->
								<?php
								while($data = mysqli_fetch_array($sql3)){
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									}
									//menampilkan data menu berdasaran id menu
									echo "<option value='$data[harga]'>$data[id_produk] - $data[harga]</option>";
								} 
								?>
							</select> <br>
						</div>
						<!--jumlah produk atau menu-->
						<label class="label_signup">Jumlah</label>
						<input type="number" class="field_signup" min="1" max="50" name = "jumlah" id="jumlah">

						<!--total harga produk atau menu-->
						<label class="label_signup">Total Harga</label>
						<!--secara otomatis menampilkan total harga-->
						<input type="text" class="field_signup" name = "totharga" id="totharga" onclick="hitung()"> <!--panggil fungsi hitung ketika di klik total harga-->

						<!--pilih metode pembayaran-->
						<label class="label_signup">Metode Pembayaran</label><br>
						<select class= "option" name="metode">
							<option></option>
							<!--terdapat metode tunai dan e-wallet-->
							<option value="Tunai"  class="option">Tunai</option>
							<option value="E-Wallet"  class="option">E-Wallet</option>
						</select> <br>

						<!--button reset-->
						<button class="btn" type="reset" name = "reset" class="btn_signup">Reset</button>
						<!--button Add-->
						<button class="btn" type="submit" name = "submit" class="btn_signup">Add</button>
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
</html><!--Tag penutp HTML-->