<?php 
$datakategori = array();

$data=mysqli_query($koneksi, "SELECT * FROM kategori");
while ($d = mysqli_fetch_array($data))
{
    $datakategori[]=$d;
}

//echo "<pre>";
//print_r($datakategori);
//echo "</pre>"
?>

<h2>EDIT PRODUCT</h2>

<?php
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";

?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="id_kategori">
            <option value="">Choose Category</option>
            <?php foreach ($datakategori as $key => $value): ?>
            <option value="<?php echo $value["id_kategori"]?>" <?php if($pecah["id_kategori"]==$value["id_kategori"]){echo "selected";}?>><?php echo $value["nama_kategori"]?></option>
            <?php endforeach?>
        </select>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" Name="nama" value="<?php echo $pecah['nama_produk']?>">
    </div>
    <div class="form-group">
        <label>Price (Rp.)</label>
        <input type="Number" class="form-control" Name="harga" value="<?php echo $pecah['harga_produk']?>">
    </div>
    <div class="form-group">
        <label>Weight (GR)</label>
        <input type="number" class="form-control" Name="berat" value="<?php echo $pecah['berat_produk']?>">
    </div>
    <div class="form-group">
        <label>Stock</label>
        <input type="number" class="form-control" Name="stok" value="<?php echo $pecah['stok_produk']?>">
    </div>
    <div class="form-group">
        <img src="fotoproduk/<?php echo $pecah['foto_produk']?>" width="200">
    </div>
    <div class="form-group">
        <label>Change Picture</label>
        <input type="file" class="form-control" Name="foto">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="deskripsi" rows="10">
            <?php echo $pecah['deskripsi_produk']; ?>
        </textarea>
    </div>
    <button class="btn btn-primary" name="ubah">EDIT</button>
</form>

<?php
if (isset($_POST['ubah']))
{
    $namafoto=$_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    //jika foto dirubah
    if (!empty($lokasifoto))
    {
        move_uploaded_file($lokasifoto, "../admin/fotoproduk/$namafoto");
        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', 
        harga_produk='$_POST[harga]', berat_produk='$_POST[berat]', 
        foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]', stok_produk= '$_POST[stok]', id_kategori = '$_POST[id_kategori]' WHERE id_produk='$_GET[id]'");
    }
    else 
    {
        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', 
        harga_produk='$_POST[harga]', berat_produk='$_POST[berat]', 
        deskripsi_produk='$_POST[deskripsi]', stok_produk= '$_POST[stok]', id_kategori = '$_POST[id_kategori]' WHERE id_produk='$_GET[id]'");
    }
    echo "<script>alert('Successfully Edited')</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>