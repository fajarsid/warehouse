<?php
    require 'function.php';
    

    // cek login
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // mencocokan database ada atau engga
        $cekdatabase = mysqli_query($connect, "SELECT * FROM admin WHERE username ='$username' and password='$password'");

        // hitung jumlah data
        $hitung = mysqli_num_rows($cekdatabase);

        if($hitung > 0){
            $_SESSION['log'] = 'True';
            header('location:index.php');
        } else {
            header('location:login.php');
        }
    }


if(!isset($_SESSION['log'])){

} else{
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="login">
        <div class="card">
            <h1 class="card-title">Hello Again!</h1>
            <form class="card-form" method="POST">
                <label for="username">Username</label>
                <div class="card-input-container username">
                    <input type="text" placeholder="Enter your username" name="username" id="username" required>
                </div>
                <label for="password">Password</label>
                <div class="card-input-container password">
                    <input type="password" placeholder="Enter your password" id="password" name="password" required>
                </div>
                <button class="card-button" name="login">Sign In</button>
            </form>
        </div>
    </div>
    <!-- partial -->

</body>

</html>