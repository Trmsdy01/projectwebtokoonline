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
                <?php $totalberat=0;?>
                <?php $totalbelanja=0;?>
                    <?php foreach($_SESSION["keranjang"] as $id_produk=>$jumlah): ?>
                        <?php $ambil= $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah= $ambil->fetch_assoc(); 
                        $subharga=$pecah["harga_produk"]*$jumlah;
                        //subberat diperoleh dari berat produk x jumlah 
                        $subberat = $pecah["berat_produk"] * $jumlah;
                        //total berat
                        $totalberat+=$subberat;

                        //echo "<pre>";
                        //echo print_r($pecah);
                        //echo "</pre>";
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
        </div>

        <div class="mb-3 mt-3">
          <label for="exampleFormControlTextarea1" class="form-label" style="font-size: large;">Alamat Pengiriman</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat_pengiriman" rows="3"></textarea>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label style="font-size: large;">Province</label>
                    <select class="form-select mt-2" name="nama_provinsi">
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label style="font-size: large;">District</label>
                    <select class="form-select mt-2" name="nama_distrik">
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label style="font-size: large;">Ekspedisi</label>
                    <select class="form-select mt-2" name="nama_ekspedisi">
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label style="font-size: large;">Cost</label>
                    <select class="form-select mt-2" name="nama_paket">
                    </select>
                </div>
            </div>
        </div><br>

        <!-- isi otomatis-->
        <div class="row">
          <div class="col-md-4 mb-3">
            <div>
              <label style="font-size: 14px;" class="">Product Weight</label>
              <input type="text" name="total_berat" value="<?php echo $totalberat?>" class="form-control mt-2">
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div>
              <label style="font-size: 14px;">Province</label>
              <input type="text" name="provinsi" class="form-control mt-2">
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div>
              <label style="font-size: 14px;">District/City</label>
              <input type="text" name="distrik" class="form-control mt-2">
            </div>
          </div><br>
          <div class="col-md-4 mb-3">
            <div>
              <label style="font-size: 14px;">District/City</label>
              <input type="text" name="tipe" class="form-control mt-2">
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div>
              <label style="font-size: 14px;">Zip Code</label>
              <input type="text" name="kodepos" class="form-control mt-2">
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div>
              <label style="font-size: 14px;">Expiditon</label>
              <input type="text" name="ekspedisi" class="form-control mt-2">
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div>
              <label style="font-size: 14px;">Shipping Packet</label>
              <input type="text" name="paket" class="form-control mt-2">
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div>
              <label style="font-size: 14px;">Shipping Cost</label>
              <input type="text" name="ongkir" class="form-control mt-2">
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div>
              <label style="font-size: 14px;">Shipping Estimation</label>
              <input type="text" name="estimasi" class="form-control mt-2">
            </div>
          </div>
        </div>
    </div>
        <!-- isi otomatis-->
        <button class="btn btn-dark mt-3" name="checkout">Checkout</button>
    </form>
    <?php 
    if (isset($_POST["checkout"]))
    {
      $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
      $tanggal_pembelian = date ("Y-m-d");
      $alamat_pengiriman = $_POST['alamat_pengiriman'];
      $totalberat = $_POST["total_berat"];
      $provinsi = $_POST["provinsi"];
      $distrik = $_POST["distrik"];
      $tipe = $_POST["tipe"];
      $kodepos = $_POST["kodepos"];
      $ekspedisi = $_POST["ekspedisi"];
      $paket = $_POST["paket"];
      $ongkir = $_POST["ongkir"];
      $estimasi = $_POST["estimasi"];

        $total_pembelian = $totalbelanja + $ongkir;

      //1.Menyimpan data ke tabel pembelian

      $koneksi->query("INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,total_pembelian,alamat_pengiriman,total_berat,provinsi,distrik,tipe,kodepos,ekspedisi,paket,ongkir,estimasi) VALUES ('$id_pelanggan', '$tanggal_pembelian', '$total_pembelian', '$alamat_pengiriman', '$totalberat', '$provinsi', '$distrik', '$tipe', '$kodepos', '$ekspedisi', '$paket', '$ongkir', '$estimasi')");

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
    <script src="../projectFinal/js/jquery.min.js"></script>
    <script src="../projectFinal/js/bootstrap.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $.ajax({
                type:'post',
                url: 'dataprovinsi.php',
                success:function(hasil_provinsi)
                {
                     $("select[name=nama_provinsi]").html(hasil_provinsi);
                }
            });

            $("select[name=nama_provinsi]").on("change",function(){
                var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
                $.ajax({
                    type:'post',
                    url:'datadistrik.php',
                    data:'id_provinsi='+id_provinsi_terpilih,
                    success:function(hasil_distrik)
                    {
                        $("select[name=nama_distrik]").html(hasil_distrik);
                    }
                })
            });

            $.ajax({
                type:'post',
                url:'dataekspedisi.php',
                success:function(hasil_ekspedisi)
                {
                    $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
                }
            });

            $("select[name=nama_ekspedisi]").on("change", function(){
                //mendapatan data ongkos kirim 

                //mendapatkan ekspedisi yang dipilih
                var ekspedisi_terpilih = $("select[name=nama_ekspedisi").val();
                //mendapatkan id_distrik yang dipilih pengguna
                var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
                //mendapatkan total_berat dari inputan
                var total_berat = $("input[name=total_berat]").val();
                $.ajax({
                    type:'post',
                    url:'datapaket.php',
                    data:'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+total_berat,
                    success:function(hasil_paket)
                    {
                        //console.log(hasil_paket);
                        $("select[name=nama_paket").html(hasil_paket);

                        //letakkan nama ekspedisi terpilih di input ekspedisi
                        $("input[name=ekspedisi]").val(ekspedisi_terpilih);
                    }
                })
            });

            $("select[name=nama_distrik").on("change", function(){
                var prov = $("option:selected", this).attr("nama_provinsi");
                var dist = $("option:selected", this).attr("nama_distrik");
                var tipe = $("option:selected", this).attr("tipe_distrik");
                var kodepos = $("option:selected", this).attr("kodepos");

                $("input[name=provinsi]").val(prov);
                $("input[name=distrik]").val(dist);
                $("input[name=tipe]").val(tipe);
                $("input[name=kodepos]").val(kodepos);
            });

            $("select[name=nama_paket").on("change", function(){
                var paket = $("option:selected", this).attr("paket");
                var ongkir = $("option:selected", this).attr("ongkir");
                var ted = $("option:selected", this).attr("etd");

                $("input[name=paket]").val(paket);
                $("input[name=ongkir]").val(ongkir);
                $("input[name=estimasi]").val(ted);

            })


        });
    </script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>