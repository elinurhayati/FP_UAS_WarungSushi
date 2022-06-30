<?php
	/* Include file koneksi.php untuk menghubungkan file php dg database*/
	include 'koneksi.php';

	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location: ");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> HOME </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="body-navbar">
	<div class="slidebar">
		<div class="logo-content">
			<div class="logo">
				<!--Icon Logo-->
				<img class="img_login" src="sushi.png">
				<div class="logo-name"> Warung Sushi</div>
			</div>
			<!--Icon Menu-->
			<i class='bx bx-menu' id="btn-menu"></i>
		</div>

		<div class="source">
			<!--Icon Source-->
			<i class='bx bx-search'></i>
			<input type="text" placeholder="Search..">
		</div>

		<ul class="nav">
			<li>
				<a href="dashboard.php">
					<!--Icon Nav-->
					<i class='bx bx-home'></i>
					<span class="link_name"> Dashboard</span>
				</a>
				<span class="tooltip"> Dashboard</span>
			</li>
			<li>
				<a href="#">
					<!--Icon Nav-->
					<i class='bx bx-dish'></i>
					<span class="link_name"> Orders</span>
				</a>
				<span class="tooltip"> Orders</span>
			</li>
			<li>
				<a href="#">
					<!--Icon Nav-->
					<i class='bx bx-history'></i>
					<span class="link_name"> History</span>
				</a>
				<span class="tooltip"> History</span>
			</li>
			<li>
				<a href="#">
					<!--Icon Nav-->
					<i class='bx bx-log-out'></i>
					<span class="link_name"> Logout</span>
				</a>
				<span class="tooltip"> Logout</span>
			</li>
		</ul>
	</div>

	<div class="home-content">
		<div class="content"> 
		</div>
	</div>
</div>
	<script>
		let btn_menu = document.querySelector('#btn-menu');
		let slidebar = document.querySelector('.slidebar');
		let btn_source = document.querySelector('.bx-search');

		btn_menu.onclick = function(){
			slidebar.classList.toggle('active');
		}
		btn_source.onclick = function(){
			slidebar.classList.toggle('active');
		}
	</script>


</body>



</html>
