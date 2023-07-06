<?php
session_start();

include 'koneksi.php';

// jika tidak ada session pelanggan  (belum login)
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
  echo "<script>alert('Please Login First !!');</script>";
  echo "<script>location='riwayat.php';</script>";
}

// mendapatkan id pembelian dari URL
$idpem=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem=$ambil->fetch_assoc();

// mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
// mendapatkan id_pelanggan yang beli
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];
if ($id_pelanggan_login !== $id_pelanggan_beli)
{
    echo "<script>alert('You are not authorized to access this page !!');</script>";
    echo "<script>location='riwayat.php';</script>";
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

<!-- Pembayaran -->
<div class="container mt-3">
    <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px">
        <h4 class="text-center mt-2" style="font-size: 30px; font-weight: 550;"><?php echo $_SESSION["pelanggan"]["nama_pelanggan"]?>'s Proof of Payemt</h4>
    </div>
    <div class="row row-product  mt-2">
        <div class="col">
        <!-- JUDUL HALAMAN -->
        <form method="post" enctype="multipart/form-data">
        <h3 class="text-judul mt-2">Input your proof of payment</h3>
					<label class="w-100 mb-4 mt-2">
						<strong>Payer's Name</strong>
						<input type="text" class="form-control mt-2" name="nama">
					</label>
					<label class="w-100 mb-3">
						<strong>Bank</strong> 
						<input type="text" class="form-control mt-2" name="bank">
					</label>
					<label class="w-100 mb-3">
						<strong>Payment Amount</strong>
						<input type="number" class="form-control mt-2" name="jumlah" min="1">
					</label>
					<label class="w-100 mb-3">
                    <strong>Proof of Payment </strong> 
                    <div class="input-group mt-2">
                        <input type="file" class="form-control" name="bukti">
                        </div>
					</label>

					<h3 class="text-judul mt-5">Metode Pembayaran</h3>
					<label class="w-100 mb-3 border rounded p-2">
						<input type="radio" name="pembayaran">
						Transfer Bank
					</label>
					<button type="submit" class="btn btn-lg btn-success mt-5 mb-5" name="kirim">Pay</button>
				</form>
			</div>

			<!-- KOLOM 2 -->
			<div class="col-md-4 offset-md-1">
				<div class="card sticky-top">
				  <div class="card-header bg-white">
				    <h3 class="text-judul">Payment that Must be Paid</h3>
				  </div>
				  <div class="card-body">
				    <div class="row mt-2 mb-2">
				    	<div class="col-md"><small>Total</small></div>
				    	<div class="col-md">Rp. <?php echo number_format($detpem["total_pembelian"])?></div>
				    </div>
				  </div>
				</div>
			</div>
		</div>
        </div>
    </div>
    </div>
</div>
<!-- Pembayaran -->

<?php 
// Jika ada tombol kirim
if (isset($_POST["kirim"]))
{
    // Upload Foto bukti 
    $namabukti = $_FILES["bukti"]["name"];
    $lokasiBukti = $_FILES["bukti"]["tmp_name"];
    $namafiks = date("YmdHis").$namabukti;
    move_uploaded_file($lokasiBukti, "bukti_pembayaran/$namafiks");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $tanggal = date("Y-m-d");

    // Simpan Pembayaran
    $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

    // Update Status Pembayaran menjadi sudah dibayar
    $koneksi->query("UPDATE pembelian SET status_pembelian='PAID' WHERE id_pembelian='$idpem'");

    echo "<script>alert('Thank you for making payment');</script>";
    echo "<script>location='riwayat.php';</script>";
}
?>

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
