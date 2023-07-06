<?php 
// koneksi ke database
session_start(); 
include 'koneksi.php';

 
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../projectFinal/css/stylelogin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pathway+Extreme:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <title>Login</title>
  </head>
  <body>

  <!-- login -->
  <form method="post">
    <section class="login d-flex">
        <div class="login-left w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-6">
                <div class="header">
                <h1>Welcome Back</h1>
                <p>Welcome back! Please enter your details.</p>
            </div>
            <div class="login-form">
            <label for="email" class="form-label">Email address</label>
            <input type="email"  name="email" class="form-control" id="email" placeholder=" Enter Your Email">

            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder=" Enter Your Password">
            <a href="#" class="text-center">Forgot Password</a>
            <button class="signin" name="login" >Sign In</button>

            <div class="text-center">
            <span class="d-inline">Don't Have an Account? <a href="daftar.php" class="signup d-inline text">Sign Up fo Free</a>
            </span>
            </div>
            </div>
            </div>
            </div>
        </div>
        <!-- login -->

        <!--carousel-->
        <div class="login-right w-50 h-100">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="../projectFinal/foto/3.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../projectFinal/foto/4.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../projectFinal/foto/5.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../projectFinal/foto/1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../projectFinal/foto/2.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    </form>
    <!--carousel-->
           
    <?php 
    //jika ada tombol simpan (tombil simpa di klik)
    if (isset($_POST["login"]))
    {
        $email=$_POST["email"];
        $password=$_POST["password"];

        //lakukan query mengecek akun di tabel pelanggan di database
        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

        //menghitung akun yang terambil
        $akunyangcocok=$ambil->num_rows;

        //Jika 1 akun yang cocok, maka login sukses
        if($akunyangcocok==1)
        {
            //Berhasil Login
            //mendapatkan akun dalam bentuk array
            $akun=$ambil->fetch_assoc();
            //simpan di session pelanggan
            $_SESSION["pelanggan"] = $akun;
            echo "<script>alert('Login Success');</script>";

            // jika sudah belanja
            if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
            {
                echo "<script>location='checkout.php'</script>";
            }
            else
            {
                echo "<script>location='index.php'</script>";
            }
            
        }
        else
        {
            //Gagal Login
            echo "<script>alert('Login Failed, Check Your Email and Password');</script>";
            echo "<script>location='login.php'</script>";
        }

    }
    ?>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>