<?php
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
    <link rel="stylesheet" type="text/css" href="../projectFinal/fontawesome/css/keranjang.css">
    <link rel="stylesheet" href="../projectFinal/css/style.css">

    <title>Rokajelly Shop</title>
  </head>
  <body>
    
<!-- navbar -->
<?php  
include 'menu.php';
?>
<!-- navbar -->
<br>

      <div class="container mt-4">
      <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px">
        <h4 class="text-center mt-2" style="font-size: 35px; font-weight: 500;">DETAIL PEMESANAN PRODUK</h4>
      </div>
      <div class="row row-product mt-2">
        <div class="col">
            <!-- Nota Copas dari nota yang ada di admnin -->
                <?php 
                $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
                $detail = $ambil->fetch_assoc();
                ?>
                <br>

              <?php
              $idpelangganygbeli = $detail["id_pelanggan"];
              
              $idpelangganyglogin = $_SESSION["pelanggan"]["id_pelanggan"];
              if ($idpelangganygbeli!==$idpelangganyglogin)
              {
                echo "<script>alert('You are not authorized to access this page');</script>";
                echo "<script>location='riwayat.php';</script>";
                exit();
              }
              ?>

                <div class="row">
                  <div class="col-md-4">
                    <h3><i>Pembelian</i></h3>
                    <strong>No. Pembelian <?php echo number_format($detail['id_pembelian']);?></strong> <br>
                    Tanggal Pembelian : <?php echo date("d F Y", strtotime($detail['tanggal_pembelian']));?> <br>
                    Total : Rp. <?php echo number_format($detail['total_pembelian']);?>
                  </div>
                  <div class="col-md-4">
                    <h3><i>Pelanggan</i></h3>
                    <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
                    <p>
                      No.Telp : <?php echo $detail['telepon_pelanggan']; ?><br>
                      Email : <?php echo $detail['email_pelanggan']; ?>
                    </p>
                  </div>
                  <div class="col-md-4">
                    <h3><i>Pengiriman</i></h3>
                    <strong><?php echo $detail['tipe'];?> <?php echo $detail['distrik'];?>, <?php echo $detail['provinsi'];?></strong> <br>
                    Ekspedisi : <?php echo $detail['ekspedisi'];?><br>
                    Estimasi : <?php echo $detail['estimasi'];?> Hari<br>
                    Ongkos Kirim : Rp. <?php echo number_format($detail['ongkir']);?><br>
                    <p class="">Alamat : <?php echo $detail['alamat_pengiriman']?></p>
                  </div>
                </div>

                <table class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Nama produk</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Jumlah</th>
                            <th>Sub Berat</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor=1; ?>
                        <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");?>
                        <?php while($pecah=$ambil->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo $pecah['berat'];?> Gr.</td>
                            <td><?php echo $pecah['jumlah']; ?></td>
                            <td><?php echo $pecah['subberat']; ?> Gr.</td>
                            <td>Rp. <?php echo number_format($pecah['subharga'] ); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php }?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class=" mt-3">
        <div class="col-md-7">
            <div class="alert alert-info">
                <p>Please Make a payment of <?php echo number_format( $detail['total_pembelian']); ?> to <br> 
            <strong>BANK MANDIRI 123-4566-78910 AN. RokaJelly Shop</strong> </p>
            </div>
        </div>
    </div>
</div>

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
