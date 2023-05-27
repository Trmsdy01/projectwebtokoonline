<?php 
// koneksi ke database
session_start(); 
include 'koneksi.php';

// mendapatkan id produk dari url 
$id_produk=$_GET["id"];

//query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";
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
    <link rel="stylesheet" type="text/css" href="../projectFinal/fontawesome/css/styleproduct.css">

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
          <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Hoome</a></li>
          <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Category</a></li>
          <li class="breadcrumb-item active" aria-current="page">Product</li>
        </ol>
      </nav>
</div>
<!--Breadcrumb -->

<!-- Single Procduct -->
<div class="container">
    <div class="row row-product">
        <div class="col-lg-5">
            <figure class="figure">
                <img src="../projectFinal/admin/fotoproduk/<?php echo $detail["foto_produk"]?>" class="figure-img img-fluid" style="border-radius: 5px; width: 450px;">
              </figure> 
        </div>
            
        <div class="col-lg-7">
            <form method="post">
            <h4><?php echo $detail["nama_produk"]?></h4>
            <div class="garis-product"></div>
            <h3 class="text-muted mb-2">Rp.<?php echo number_format($detail["harga_produk"])?></h3>

            <h6 class="mt-3">Stok : <?php echo $detail["stok_produk"]?></h6>
            
            <input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail["stok_produk"]?>">

            <div class="btn-produk mt-3">
              <button class="btn btn-warning btn-lag" style="font-size: 14px;" name="masuk">Add to Cart</button>
            </div>
            </form>
            <?php
            // jika ada tombol beli
            if (isset($_POST["masuk"]))
            {
                // mendapatkan jumlah yang dibeli
                $jumlah = $_POST["jumlah"];
                //masukkan di keranjang belanja
                $_SESSION["keranjang"][$id_produk] = $jumlah;

                echo "<script>alert('Added to Cart');</script>";
                echo "<script>location='keranjang.php';</script>";
            }
            ?>
        </div> 
   

  
<!-- Detail -->
<div class="row row-product">
  <div class="col-12">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Product Details</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Review</button>
      </li>
    </ul>
    <div class="tab-content p-3" id="myTabContent">
      <div class="tab-pane fade show active deskripsi" id="description" role="tabpanel" aria-labelledby="description-tab">
          <h4><?php echo $detail["nama_produk"]?></h4>
          <p><?php echo $detail["deskripsi_produk"]?></p>
      </div>  
      <div class="tab-pane fade review" id="review" role="tabpanel" aria-labelledby="review-tab">
        <div class="row">
          <div class="col-1">
            <img src="../projectFinal/foto/hange.png" class="review-img rounded-circle">
          </div>
          <div class="col">
            <h5 class="review-name">Hange Zoe</h5>
            <p class="review-des">Produk Original, Packing Rapi, Pengiriman Cepat</p>
          </div>
        </div>
<!-- Detail -->

<!-- Review -->
        <div class="row">
          <div class="col-1">
            <img src="../projectFinal/foto/levi.png" class="review-img rounded-circle">
          </div>
          <div class="col">
            <h5 class="review-name">Levi Ackerman</h5>
            <p class="review-des">Produk Original, Packing Rapi, Pengiriman Cepat</p>
          </div>
        </div>

        <div class="row">
          <div class="col-1">
            <img src="../projectFinal/foto/eren.png" class="review-img rounded-circle">
          </div>
          <div class="col">
            <h5 class="review-name">Eren Yeager</h5>
            <p class="review-des">Produk Original, Packing Rapi, Pengiriman Cepat</p>
          </div>
        </div>

        <div class="row">
          <div class="col-1">
            <img src="../projectFinal/foto/jean.png" class="review-img rounded-circle">
          </div>
          <div class="col">
            <h5 class="review-name">Jean</h5>
            <p class="review-des">Produk Original, Packing Rapi, Pengiriman Cepat</p>
          </div>
        </div>

        <div class="row">
          <div class="col-1">
            <img src="../projectFinal/foto/reiner.png " class="review-img rounded-circle">
          </div>
          <div class="col">
            <h5 class="review-name">Reiner Braun</h5>
            <p class="review-des">Produk Original, Packing Rapi, Pengiriman Cepat</p>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>
</div>


<!-- Single Procduct -->

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