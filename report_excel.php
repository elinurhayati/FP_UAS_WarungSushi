<?php
	/* Include file koneksi.php untuk menghubungkan file php dg database*/
	include 'koneksi.php';
	//fungsi yang dipanggil secara otomatis oleh PHP ketika fitur autoloading diaktifkan
	require 'vendor/autoload.php'; //panggil file autoload.php yang ada pada folder vendor
	//gunakan namespace dari phpSpreadsheet
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	//mendeklarasikan variabel spreadsheet
	$spreadsheet = new Spreadsheet();

	//variabel sheet untuk activesheet pada file excel
	$sheet = $spreadsheet->getActiveSheet();
	//isi kolom A1 hingga H1
	$sheet->setCellValue('A1', 'Id Transaksi');
	$sheet->setCellValue('B1', 'Tanggal');
	$sheet->setCellValue('C1', 'Customer');
	$sheet->setCellValue('D1', 'Produk');
	$sheet->setCellValue('E1', 'Harga');
	$sheet->setCellValue('F1', 'Jumlah');
	$sheet->setCellValue('G1', 'Total Harga');
	$sheet->setCellValue('H1', 'Metode Pembayaran');

	//query untuk menampilkan seluruh data yang ada pada tabel pesanan
	$query = mysqli_query($conn, "SELECT * FROM tb_pesanan");
	$i = 2;
	while($row = mysqli_fetch_array($query)){
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A'.$i, $row['id']); //kolom A untuk id pesanan
		$sheet->setCellValue('B'.$i, $row['date']); //kolom B untuk tangal pesanan
		$sheet->setCellValue('C'.$i, $row['customer']); //kolom C untuk nama customer pesanan
		$sheet->setCellValue('D'.$i, $row['produk']); //kolom D untuk nama menu yang dipesanan
		$sheet->setCellValue('E'.$i, $row['harga']); //kolom E untuk harga per menu pesanan
		$sheet->setCellValue('F'.$i, $row['jumlah']); //kolom F untuk jumlah pesanan
		$sheet->setCellValue('G'.$i, $row['total_harga']); //kolom G untuk total harga pesanan
		$sheet->setCellValue('H'.$i, $row['metode_bayar']); //kolom H untuk metode pembayaran
		$i++;
	}
	//baris kode ke-36 hingga ke-45 untuk memberi style yaitu border pada sheet
	$styleArray = [
		'borders' => [
			'allBorders' => [
				'borderStyle'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			],
		],
	];

	$i = $i - 1;
	$sheet->getStyle('A1:H'.$i)->applyFromArray($styleArray); //menerapkan styleArray

	//deklarasi untuk membuat file excel
	$writter = new Xlsx($spreadsheet);
	$writter->save('Laporan Penjualan Warung Sushi.Xlsx') //nama file report excel .Xlsx
?>