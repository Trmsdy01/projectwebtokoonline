<?php
session_start();
$id_produk=$_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('the product has been removed from the cart');</script>";
echo "<script>location='keranjang.php';</script>";
?>