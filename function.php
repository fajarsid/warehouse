<!-- koneksi database -->
<?php
     if(!isset($_SESSION)) 
     { 
         session_start(); 
     } 


    $connect = mysqli_connect("localhost","root","","dbwarehouse" );


    
    // menambah barang baru
    if(isset($_POST['tambahbarang'])){
        $namabarang = $_POST['namabarang'];
        $jenis = $_POST['jenis'];
        $jumlah = $_POST['jumlah'];
        $jreject = $_POST['jenis_reject'];
        $jumlah_reject = $_POST['jumlah_reject'];
        $bagus = $_POST['bagus'];
        $tanggal = $_POST['tanggal'];

        $addtotable = mysqli_query($connect,"insert into masuk (namabarang, jenis, jumlah, jenis_reject, jumlah_reject, bagus, tanggal) values('$namabarang','$jenis','$jumlah','$jreject','$jumlah_reject','$bagus','$tanggal') ");
        if($addtotable){
            header('location:masuk.php');
        } else{
            echo 'Gagal';
            header('location:masuk.php');
        }

    };

    // Update Barang
    if(isset($_POST['updatedata'])){
        $idm = $_POST['idmasuk'];
        $namabarang = $_POST['namabarang'];
        $jenis = $_POST['jenis'];
        $jumlah = $_POST['jumlah'];
        $jreject = $_POST['jenis_reject'];
        $jumlah_reject = $_POST['jumlah_reject'];
        $bagus = $_POST['bagus'];
        $tanggal = $_POST['tanggal'];

        $update_data = mysqli_query($connect,
        "UPDATE masuk SET 
        namabarang = '$namabarang',
        jenis ='$jenis',
        jumlah ='$jumlah',
        jenis_reject = '$jreject', 
        jumlah_reject = '$jumlah_reject',
        bagus = '$bagus', 
        tanggal = '$tanggal' WHERE idmasuk='$idm' ");
        if($update_data){
            header('location:masuk.php');
        } else{
            $message = 'Update Data Gagal Gagal';
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    };

    // Hapus data anggota
    if(isset($_POST['hapusdata'])){
        $idm = $_POST['idmasuk'];

        $hapus = mysqli_query($connect, "DELETE FROM masuk WHERE idmasuk='$idm'");
        if($hapus){
            header('location:masuk.php');
        } else{
            $message = "Hapus Data Gagal!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

?>