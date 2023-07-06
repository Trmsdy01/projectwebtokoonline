<?php
session_start();

include 'koneksi.php';

// jika tidak ada session pelanggan  (belum login)
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
  echo "<script>alert('Please Login First !!');</script>";
  echo "<script>location='index.php';</script>";
}
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
    <link rel="stylesheet" type="text/css" href="../projectFinal/fontawesome/css/keranjang.css">

    <title>Rokajelly Shop</title>
  </head>
  <body>
    
<!-- navbar -->
<?php  
include 'menu.php';
?>
<!-- navbar -->

<!-- Bradcrumb -->
<div class="container">
    <nav aria-label="breadcrumb" style="background-color: #fff;" class="mt-3">
        <ol class="breadcrumb p-3">
          <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
          <li class="breadcrumb-item"><a href="riwayat.php" class="text-decoration-none">History</a></li>
        </ol>
      </nav>
</div>
<!--Breadcrumb -->

<!-- riwayat belanja -->
<section class="riwayat">
<div class="container">
    <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px">
        <h4 class="text-center mt-2" style="font-size: 30px; font-weight: 550;"><?php echo $_SESSION["pelanggan"]["nama_pelanggan"]?>'s Shopping History</h4>
    </div>
    <div class="row row-product  mt-2">
        <div class="col ">
            <table class="table">
                <thead class="table-secondary">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody class="align-middle">
                <?php $nomor=+1;?>
                    <?php
                    // mendapatkan akun
                    $id = $_SESSION["pelanggan"]['id_pelanggan'];
                    
                    $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id'");
                    while ($pecah = $ambil->fetch_assoc()){
                    ?>
                    <tr>
                        <th><?php echo $nomor ?></th>
                        <th><?php echo $pecah["tanggal_pembelian"];?></th>
                        <th>
                          <?php echo $pecah["status_pembelian"];?>
                          <br>
                          <?php if (!empty($pecah['resi_pengiriman'])): ?>
                            RESI : <?php echo $pecah['resi_pengiriman']; ?>
                          <?php endif ?>  
                        </th>
                        <th>Rp. <?php echo number_format($pecah["total_pembelian"]); ?></th>
                        <th>
                            <a href="nota.php?id=<?php echo $pecah["id_pembelian"];?>" class="btn btn-info">Nota</a>
                            <?php if ($pecah['status_pembelian']=="pending"): ?>
                              <a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"];?>" class="btn btn-success">Payment</a>
                              <?php else:?>
                              <a href="lihatpembayaran.php?id=<?php echo $pecah["id_pembelian"];?>" class="btn btn-warning">See Payment</a>
                            <?php endif?>
                        </th>
                    </tr>
                    <?php $nomor++ ?>
                    <?php } ?>
                </tbody>
              </table>
        </div>
    </div>
    </div>
</div>
</section>
<!-- riwayat belanja -->

<!-- Footer -->
<footer class="bg-light p-5 mt-5" >
  <div class="conteiner">
    <div class="row">
      <div class="col-md-6">
        <a href="" class="text-decoration-none">
          <img src="../projectFinal/foto/paw1.png" style="width: 30px;" >
        </a>
        <span>
          Copyright @2023 | Created and Develop by <a href="https://www.linkedin.com/in/trie-meutia-5149a8192/" class="text-decoration-none text-dark fw-bold">Trie Meutia Saddyah</a>
        </span>
      </div>

      <div class="col-md-6 text-end">
        <a href="" class="text-decoration-none">
          <img src="../projectFinal/foto/facebook.png" class="ms-2" style="width: 40px;" >
        </a>
        <a href="" class="text-decoration-none">
          <img src="../projectFinal/foto/linkedin.png" class="ms-2" style="width: 40px;" >
        </a>
        <a href="" class="text-decoration-none">
          <img src="../projectFinal/foto/instagram.png" class="ms-2" style="width: 40px;" >
        </a>
        <a href="" class="text-decoration-none">
          <img src="../projectFinal/foto/twitter.png" class="ms-2" style="width: 40px;" >
        </a>
      </div>

    </div>
  </div>
</footer> 
<!-- Footer -->

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
