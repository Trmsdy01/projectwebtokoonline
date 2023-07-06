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
     <!-- fontawesome cdn -->
     <link rel="stylesheet" href="../projectFinal/fontawesome/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../projectFinal/css/style.css">
    <title>Rokajelly Shop</title>
  </head>

<body style="background-color: #DCDCDC;">

<!-- navbar -->
<?php  
include 'menu.php';
?>
<!-- navbar -->


<!--carousel-->
<div class="container">   
  <div id="carouselExampleControls" class="carousel  mt-5" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../projectFinal/foto/img1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../projectFinal/foto/img2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../projectFinal/foto/img3.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../projectFinal/foto/img4.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../projectFinal/foto/img5.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../projectFinal/foto/img6.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<!--carousel-->


<!-- produk -->
<div class="container mt-4">
      <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px">
        <h4 class="text-center" style="font-size: 22px; font-weight: 900;">PRODUK</h4>
      </div>
      <div class="row">
      <div class="container mt-2">
        <div class="row">

        <?php $ambil=$koneksi->query("SELECT * FROM produk")?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>

          <div class="col-lg-2 col-md-2 col-sm-4 col-6 mt-2">
          <div class="card">
            <img src="../projectFinal/admin/fotoproduk/<?php echo $perproduk['foto_produk'] ?>" class="card-img-top img" alt="...">
            <div class="card-body">
              <h6 class="card-title text-center textForm"><?php echo $perproduk['nama_produk'] ?></h6>
              <p class="card-text text-center">Rp. <?php echo number_format($perproduk['harga_produk']); ?></p>
              <div class="d-grid gap-2">
              <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-outline-dark" type="button" name="detail">Detail</a>
              <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-dark " type="button">Buy</a>
              </div>
            </div>
          </div>
        </div>  
            <?php }?>    
        </div>
    </div>
  </div>
</div>
<!-- produk -->

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