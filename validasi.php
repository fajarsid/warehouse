<?php
    // jika belum login tidak bisa masuk
    if(isset($_SESSION['log'])){

    } else {
        header('location:login.php');
    }
?>