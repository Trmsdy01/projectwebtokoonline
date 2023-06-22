<?php 
// koneksi ke database
session_start(); 
$koneksi = mysqli_connect("localhost", "root", "", "dbtoko"); 

//jika tidak ada session pelanggan (blm login) maka dilarikan ke login.php
if (!isset($_SESSION["pelanggan"]))
{
  echo "<script>alert('Login First !!');</script>";
  echo "<script>location='login.php'</script>";
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

<!-- Keranjang & Checkout -->
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
                  </tr>
                </thead>
                <tbody class="align-middle">
                <?php $nomor=+1;?>
                <?php $totalbelanja=0;?>
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
                  </tr>
                  <?php $nomor++ ?>
                  <?php $totalbelanja+=$subharga;?>
                  <?php endforeach?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4">Total belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja)?></th>
                  </tr>
                </tfoot>
              </table>
        </div>
    </div>
    <form method="post" class="mt-3">
        <div class="row">
          <div class="col-md-4">
            <div>
              <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan']?>" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
          <div>
              <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan']?>" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <select class="form-select" name="id_ongkir">
            <option selected>Choose shipping cost</option>
              <?php 
              $ambil=$koneksi->query("SELECT * FROM ongkir");
              while($perongkir=$ambil->fetch_assoc()){
              ?>
              <option value="<?php echo $perongkir["id_ongkir"]?>">
                <?php echo $perongkir['nama_kota']?> -
                Rp. <?php echo number_format($perongkir['tarif'])?>
              </option>
              <?php }?>
            </select>
          </div> 
        </div>
        <div class="mb-3 mt-3">
          <label for="exampleFormControlTextarea1" class="form-label" style="font-size: large;">Alamat Pengiriman</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat_pengiriman" rows="3"></textarea>
        </div>
        <button class="btn btn-dark mt-3" name="checkout">Checkout</button>
    </form>
    <?php 
    if (isset($_POST["checkout"]))
    {
      $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
      $id_ongkir = $_POST["id_ongkir"];
      $tanggal_pembelian = date ("Y-m-d");
      $alamat_pengiriman = $_POST['alamat_pengiriman'];

      $ambil =$koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
      $arrayongkir = $ambil->fetch_assoc();
      $nama_kota = $arrayongkir['nama_kota'];
      $tarif = $arrayongkir['tarif'];

        $total_pembelian = $totalbelanja + $tarif;

      //1.Menyimpan data ke tabel pembelian

      $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,	alamat_pengiriman) VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_kota', '$tarif', '$alamat_pengiriman')");

      // mendapatkan id_pembelian barusan terjadi
      $id_pembelian_barusan = $koneksi->insert_id;

      foreach($_SESSION["keranjang"] as $id_produk => $jumlah) 
      {
        //mendapatkan data produk berdasarkan id_produk
        $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $perproduk=$ambil->fetch_assoc();

        $nama=$perproduk['nama_produk'];
        $harga=$perproduk['harga_produk'];
        $berat=$perproduk['berat_produk'];
        $subberat=$perproduk['berat_produk']*$jumlah;
        $subharga=$perproduk['harga_produk']*$jumlah;

        $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) VALUES ('$id_pembelian_barusan', '$id_produk', '$nama', '$harga', '$berat', '$subberat', '$subharga', '$jumlah')");

        // skript update stok
        $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah WHERE id_produk='$id_produk'");
      }

      //mengkosongkan tampilan data keranjang belanja
      unset ($_SESSION["keranjang"]);

      //Tampilan Dialihkan ke halaman nota, nota dari pembelian barusan
      echo "<script>alert('Checkout Success');</script>";
      echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
    }
    ?>
</div>

<pre><?php print_r($_SESSION['pelanggan'])?></pre>
<pre><?php print_r($_SESSION['keranjang'])?></pre>
<!-- Keranjang & Checkout-->

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