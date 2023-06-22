<?php 

$id_foto = $_GET["idfoto"];
$id_produk =$_GET["idproduk"];

$ambilfoto = $koneksi->query("SELECT *FROM produk_foto WHERE id_produk_foto='$id_foto'");
$detailfoto = $ambilfoto->fetch_assoc();

$namafilefoto = $detailfoto["nama_produk_foto"];

unlink("../admin/fotoproduk".$namafilefoto);

$koneksi->query("DELETE FROM produk_foto WHERE id_produk_foto='$id_foto'");

echo "<script>alert('Product photo data has been successfully deleted');</script>";
echo "<script>location='index.php?halaman=detailproduk&id=$id_produk';</script>";

?>