<?php
	/* Include file koneksi.php untuk menghubungkan file php dg database*/
	include 'koneksi.php';

	//Ketika button submit diklik
	if(isset($_POST['submit'])){
		//Menampung isian username & passoword yg diinputkan
		$username = $_POST['username'];
		$password = $_POST['password'];
		$error="";
		//Query untuk select data dari tabel tb_admin
		$sql="SELECT * FROM tb_admin WHERE username='$username' and password='$password';";
		$qry=mysqli_query($conn, $sql) or die("Proses Login gagal");
		$cek = mysqli_num_rows($qry);
		//Seleksi kondisi apakah login berhasil / gagal
		if($cek>0){
			//Memulai eksekusi session
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['status'] = 'login';
			//Menampilkan pesan login sukses
			echo "<script> alert ('Login success'); </script>";
			//Mengarahkan ke laman dashboard_admin
			header("location:dashboard_admin.php");

		}else{
			//Menampilkan pesan login gagal
			echo "<script> alert ('Login failed'); </script>";
		} 
	} 
?>

<DOCTYPE HTML>
<html>
<head>
	<title> Login Admin</title>
	<script type="text/javascript" src="Chart.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,200;1,300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="">
		<div class = "container">
			<form class="box" action="" method="POST">
				<div class="input">
					<!--Logo admin-->
					<img class="img_login" src="man_2.png">
					<h1>LOGIN ADMIN</h1>
					<!--Field inputan username & password-->
				    <input type="text" class="field" name = "username" id="username" placeholder="Username">
				    <input type="password" class="field" name = "password" placeholder="Password">
				    <!--Button submit & reset-->
					<button class="btn" type="reset" name = "reset" class="btn">Reset</button>
					<button class="btn" type="submit" name = "submit" class="btn">Login</button>
				</div>
			</form>
		</div>
	</div>
	
</body>
</html>