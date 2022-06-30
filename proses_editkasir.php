<?php 
    /* Include file koneksi.php untuk menghubungkan file php dg database*/
    include"koneksi.php";

    //Seleksi kondisi ketika diklik button update
    if(isset($_POST['update'])){
        //Variabel untuk menampung pengambilan data yang dikirim dengan method POST
        $aid = $_REQUEST['id'];
        $aname = $_REQUEST['nama'];
        $aaddress = $_REQUEST['address'];
        $aemail = $_REQUEST['email'];
        $ausername = $_REQUEST['username'];
        $apassword = $_REQUEST['password'];

        //Variabel untuk menampung update data tb_kasir
        //Update data terhadap nama, address, email, username, dan password pada tb_kasir berdasarkan id yang diperoleh
        $sql = "UPDATE tb_kasir SET name='$aname', address='$aaddress', email='$aemail', username='$ausername', password='$apassword' WHERE id='$aid' ";
        //Variabel untuk menampung pengiriman perintah query ke database mysql
        $qry = mysqli_query($conn, $sql);

        //Seleksi kondisi ketika berhasil menjalankan fungsi pada $qry
        if($qry){
            //Menampilkan alert data sukses terupdate dan mengarahkan kembali ke file kelola_kasir.php
            echo "<script> 
                    alert('Data successfully updated');
                    document.location = 'kelola_kasir.php';
                </script>";
        }
        //Ketika fungsi pada $qry gagal dijalankan 
        else{
            //Menampilkan pesan error
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        }
    }
?>