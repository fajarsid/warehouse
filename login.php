<?php
    require 'function.php';
    

    // cek login
    if(isset($_POST['submit'])){
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
    <meta charset="UTF-8" />
    <title>Form Login</title>
    <link rel="stylesheet" href="css/stylelogin.css" />
</head>

<body>
    <!-- partial:index.partial.html -->

    <body>
        <span id="root">
            <section class="section-all">
                <!-- 1-Role Main -->
                <main class="main" role="main">
                    <div class="wrapper">
                        <article class="article">
                            <div class="content">
                                <div class="login-box">
                                    <div class="header">
                                        <p>Form Login</p>
                                    </div>
                                    <!-- Header end -->
                                    <div class="form-wrap">
                                        <form class="form" method="POST">
                                            <div class="input-box">
                                                <input type="text" id="name" aria-describedby="" placeholder="Username"
                                                    aria-required="true" maxlength="30" autocapitalize="off"
                                                    autocorrect="off" name="username" value="" required />
                                            </div>

                                            <div class="input-box">
                                                <input type="password" name="password" id="password"
                                                    placeholder="Password" aria-describedby="" maxlength="30"
                                                    aria-required="true" autocapitalize="off" autocorrect="off"
                                                    required />
                                            </div>

                                            <span class="button-box">
                                                <button class="btn" type="submit" name="submit">Log in</button>
                                            </span>
                                        </form>
                                    </div>
                                    <!-- Form-wrap end -->
                                </div>
                            </div>
                            <!-- Content end -->
                        </article>
                    </div>
                    <!-- Wrapper end -->
                </main>
            </section>
        </span>
        <!-- Root -->

        <!-- Select Link -->
        <script type="text/javascript">
        function la(src) {
            window.location = src;
        }
        </script>
    </body>
    <!-- partial -->
</body>

</html>