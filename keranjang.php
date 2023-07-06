<?php
session_start();

include 'koneksi.php';


if (empty($_SESSION ["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
  echo "<script>alert('Your cart is empty, please shop');</script>";
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
          <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
          <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Cart</a></li>
        </ol>
      </nav>
</div>
<!--Breadcrumb -->

<!-- Keranjang -->
<div class="container">
    <div class="row row-product">
        <div class="col">
            <table class="table">
                <thead class="table-secondary">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="align-middle">
                <?php $nomor=+1;?>
                    <?php foreach($_SESSION["keranjang"] as $id_produk=>$jumlah): ?>
                        <?php $ambil= $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah= $ambil->fetch_assoc(); 
                        $subharga=$pecah["harga_produk"]*$jumlah;

                        
                        ?>
                  <tr>
                    <th><?php echo $nomor ?></th>
                    <td><?php echo $pecah['nama_produk']; ?></td>
                    <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp. <?php echo number_format($subharga); ?></td>
                    <td>
                      <a href="hapuskeranjang.php?id=<?php echo $id_produk?>" class="btn btn-danger"><i class="fas fa-minus"></i></a>
                    </td>
                  </tr>
                  <?php $nomor++ ?>
                  <?php endforeach?>
                </tbody>
              </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col ">
        <a href="index.php" class="btn btn-outline-dark">Continue Shopping</a>
        <a href="checkout.php" class="btn btn-dark">Checkout</a>
        </div>
    </div>
</div>
<!-- Keranjang -->

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
