<?php 
    /* Include file koneksi.php untuk menghubungkan file php dg database*/
    include"koneksi.php";

    //Seleksi kondisi ketika diklik button update
    if(isset($_POST['update'])){
        //Variabel untuk menampung pengambilan data yang dikirim dengan method POST
        $aid = $_REQUEST['id_produk'];
        $akategori = $_REQUEST['kategori'];
        $amenu = $_REQUEST['menu'];
        $agambar = $_REQUEST['gambar'];
        $aharga = $_REQUEST['harga'];
        $astatus = $_REQUEST['status'];

        //Variabel untuk menampung update data tb_menu
        //Update data terhadap kategori, menu, gambar, harga, dan status pada tb_menu berdasarkan id yang diperoleh
        $sql = "UPDATE tb_menu SET kategori='$akategori', menu='$amenu', gambar='$agambar', harga='$aharga', status='$astatus' WHERE id_produk='$aid' ";
        //Variabel untuk menampung pengiriman perintah query ke database mysql
        $qry = mysqli_query($conn, $sql);

        //Seleksi kondisi ketika berhasil menjalankan fungsi pada $qry
        if($qry){
            //Menampilkan alert data sukses terupdate dan mengarahkan kembali ke file kelola_menu.php
            echo "<script> 
                    alert('Data successfully updated');
                    document.location = 'kelola_menu.php';
                </script>";
        } 
        //Ketika fungsi pada $qry gagal dijalankan
        else{
            //Menampilkan pesan error
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        }
    }
?>