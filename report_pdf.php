<?php
	/* Include file koneksi.php untuk menghubungkan file php dg database*/
	include 'koneksi.php';
?>

<!DOCTYPE html> <!--Tag pembuka HTML-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Import link external css-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--Import link untuk referensi boxicon-->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="body-navbar">
		<!--bagian header, judul-->
		<center> 
			<h2> LAPORAN TRANSAKSI WARUNG SUSHI</h2>
		</center>
		<div>
			<!--membuat tabel-->
			<table class = "table_order" border="1px" align="center"> 
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
		    			<!--mengisi data pada tabel dengan data yang ada di database_warungsushi pada tabel pesanan-->
		    			<?php 
		    				//query untuk menampilkan data yang ada di tabel pesanan
		    				$show = mysqli_query($conn, "SELECT * FROM tb_pesanan");
		    				while ($row = mysqli_fetch_array($show)){
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
	            			}
		    			?>
		    		</tbody>
		    		<script> 
		    		//fungsinya untuk mencetak data yang berisi laporan penjualan
		    			window.print()
		    		</script>
	    		</table>
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