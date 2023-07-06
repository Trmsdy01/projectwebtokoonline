<?php 
// koneksi ke database
session_start(); 
include 'koneksi.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

//echo "<pre>";
//print_r($detbay);
//echo "</pre>";

if (empty($detbay))
{
    echo "<script>alert('no payment yet');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}

if ($_SESSION["pelanggan"]['id_pelanggan']!==$detbay['id_pelanggan'])
{
    echo "<script>alert('You are not authorized to access this page');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}

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
    <link rel="stylesheet" type="text/css" href="../projectFinal/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../projectFinal/fontawesome/css/keranjang.css">
    <title>Rokajelly Shop</title>
  </head>

<body style="background-color: #DCDCDC;">

<!-- navbar -->
<?php  
include 'menu.php';
?>
<!-- navbar -->
<!-- lihatpembayaran -->
<div class="container mt-3">
    <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px">
        <h4 class="text-center mt-2" style="font-size: 30px; font-weight: 550;"><?php echo $_SESSION["pelanggan"]["nama_pelanggan"]?>'s Payment History</h4>
    </div>
    <div class="row row-product  mt-2">
        <div class="col">
        <table class="table">
                  <tr>
                    <th scope="col" class="table-primary">Nama</th>
                    <td class="table-primary"><?php echo $detbay["nama"]?></td>
                  </tr>
                  <tr>
                    <th scope="col">Bank</th>
                    <td><?php echo $detbay["bank"]?></td>
                  </tr>
                  <tr>
                    <th scope="col" class="table-primary">Jumlah</th>
                    <td class="table-primary">Rp. <?php echo number_format($detbay["jumlah"])?></td>
                  </tr>
                  <tr>
                    <th scope="col">Tanggal</th>
                    <td><?php echo $detbay["tanggal"]?></td>
                  </tr>
              </table>
		</div>

			<!-- KOLOM 2 -->
			<div class="col-md-4 offset-md-1">
				<div class="card">
				  <div class="card-body">
                  <img src="../projectFinal/bukti_pembayaran/<?php echo $detbay["bukti"]?>" class="card-img-top" alt="...">
				  </div>
				</div>
			</div>
		</div>
        </div>
    </div>
    </div>
</div>
<!-- lihatpembayaran -->

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