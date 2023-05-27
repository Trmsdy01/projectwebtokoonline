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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../projectFinal/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../projectFinal/css/styleregister.css">
    

    <title>Rokajelly Shop</title>
  </head>
  <body>
  <div class="container">
        <form class="form-container" method="post">
            <h3 class="textjudul">Sign Up</h3>
            <div class="row  mt-3">
            <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Full Name</label>
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user fa-flip" style="color: #050506;"></i></span>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name" name="nama" required>
            </div>
            </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Password</label>
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" name="pass" required>
                </div>
                </div>
                </div>

               
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">E-Mail</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
                    </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="telp">
                      </div>
                      </div>
                      </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Address</label>
                                    <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-sharp fa-solid fa-location-dot"></i></span>
                                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Address" name="alamat">
                                </div>
                                </div>
                                </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">I agree to <span class="text-merah">terms and conditions</span><span class="text-merah">*</span></label>
            </div>

            <div class="mt-3">
                <div class="row">
                    <div class="col-md-6 d-grid">
                    <button type="submit" class="btn btn-outline-primary" name="daftar">Sign Up</button>
                    </div>

                    <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-outline-danger">Cancel</button>
                        </div>
                </div>
            </div>

            <div class="mt-3">
                <label>Already have an account? <a href="login.php" class="text-login">Login Here</a></label>
            </div>
          </form>
          <?php
          // jika ada tombol daftar (tekan tombol daftar)
          if (isset($_POST["daftar"]))
          {
            // mengambil isian nama, email, password, alamat, nomor tlp
            $nama = $_POST["nama"]; 
            $pass = $_POST["pass"];
            $email = $_POST["email"];
            $tlp = $_POST["telp"];
            $alamat = $_POST["alamat"];

            // cek apakah email sudah digunakan
            $ambil=$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
            $yangcocok=$ambil->num_rows;
            if ($yangcocok==1)
            {
              echo "<script>alert('Register Failed !! Please use diffrent Email !!');</script>";
              echo "<script>location='daftar.php';</script>";
            }
            else
            {
              // masukkan data ke tabel pelanggan di database
              $koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUES ('$email', '$pass', '$nama', '$tlp', '$alamat')");

              echo "<script>alert('Register Success');</script>";
              echo "<script>location='login.php';</script>";
            }
          }
          ?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>