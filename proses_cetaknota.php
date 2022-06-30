<?php 
/* Include file koneksi.php untuk menghubungkan file php dg database*/
include"koneksi.php";

//mendeklarasikan variabel id
$id = $_GET['id'];
// Query utk select data dari tb_pesanan
$qry = mysqli_query($conn, "SELECT * FROM tb_pesanan where id='".$id."'");
// Melakukan perulangan ketika dilakukan pengambilan / SELECT data dari tb_pesanan
while($row = mysqli_fetch_array($qry)){
	$aid = $row['id'];
	$atanggal = $row['date'];
	$acustomer = $row['customer'];
	$aproduk = $row['produk'];
	$aharga = $row['harga'];
	$ajumlah = $row['jumlah'];
	$atotal_harga= $row['total_harga'];
	$ametode_bayar = $row['metode_bayar'];
}
?>

<?php
/* Include file koneksi.php untuk menghubungkan file php dg database*/
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Import link external css-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--Import link untuk referensi boxicon-->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<!--penggunaan CSS internal-->
	<style type="text/css">
		.wrap{
			margin-left: 38px;
			line-height: 4px;
		}
		.wrap2{
			text-align: center;
			line-height: 4px;
		}
		.judul{
			font-size: 16px;
		}
		h2{
			line-height: 4px;
		}
	</style>
</head>
<body>
	<div class="body-navbar">
		<!--bagian header nota-->
		<center>
			<h2> WARUNG SUSHI</h2>
			<text class="judul">Jl Raya Rungkut Madya, Gunung Anyar, Kota Surabaya, Jawa Timur</text><br>
			<text class="judul">Business Hours : 10:00 - 22:00 (Sunday to Saturday)</text>
		</center>
		<div>
			<!--bagian isi nota sesuai order customer-->
			<div class="wrap">
				<br><br><br><br>
				<p>ID Pesanan : <?php echo "<td>".$aid."</td>"; ?></p>
				<p>Tanggal    : <?php echo "<td>".$atanggal."</td>"; ?></p>
				<p>Customer   : <?php echo "<td>".$acustomer."</td>"; ?></p>
			</div>
			<table class = "table_order" border=".5px" align="center">
				<thead>
					<tr> <!--Membuat kolom tabel-->
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total Harga</th>
						<th>Metode Bayar</th>
					</tr>
				</thead>
				<tbody>
					<?php 
		    		//Pemanggilan data dari tabel pesanan
					echo "<tr>";
					echo "<td>".$aproduk ."</td>";
					echo "<td>".$aharga."</td>";
					echo "<td>".$ajumlah."</td>";
					echo "<td>".$atotal_harga."</td>";
					echo "<td>".$ametode_bayar."</td>";
					?>
				</tbody>
				<script> //fungsi cetak untuk mencetak pesanan customer
					window.print()
				</script>
			</table>
			<div class="wrap2">
				<!--bagian bawah nota-->
				<br><br><br>
				<p>Thank You For Coming</p> 
				<p>Have a Good Day</p> 
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