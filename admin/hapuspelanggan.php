<?php

$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

echo "<script>alert('deleted successfully')</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>"

?>