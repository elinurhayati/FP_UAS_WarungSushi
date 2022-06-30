<?php 
/* Include file koneksi.php untuk menghubungkan file php dg database*/
include"koneksi.php";
//Ketika button submit diklik
if(isset($_POST['submit'])){
    //Menampung isian data baru yg diinputkan user
    $aid = $_REQUEST['id'];
    $atanggal = $_REQUEST['date'];
    $acustomer = $_REQUEST['customer'];
    $aid_produk = $_REQUEST['id_produk'];
    $aproduk = $_REQUEST['produk'];
    $aharga = $_REQUEST['harga'];
    $ajumlah = $_REQUEST['jumlah'];
    $atotal_harga= $_REQUEST['totharga'];
    $ametode_bayar = $_REQUEST['metode_bayar'];
    //query untuk mengupdate inputan user ke tabel pesanan sesuai dengan idnya
    $sql = "UPDATE tb_pesanan SET date='$atanggal', customer='$acustomer', id_produk='$aid_produk', produk='$aproduk', harga='$aharga', total_harga='$atotal_harga', jumlah='$ajumlah', metode_bayar='$ametode_bayar' WHERE id='$aid' ";
    $qry = mysqli_query($conn, $sql);
    //Seleksi kondisi apakah login berhasil / gagal
    if($qry){
        //Menampilkan pesan update sukses
        echo "<script> 
        alert('Data successfully updated');
        document.location = 'orders.php';
        </script>";
    } else{
        //Menampilkan pesan login gagal
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>