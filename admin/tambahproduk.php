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

<h2>Add Product</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="id_kategori">
            <option value="">Choose Category</option>
            <?php foreach ($datakategori as $key => $value): ?>
            <option value="<?php echo $value["id_kategori"]?>"><?php echo $value["nama_kategori"]?></option>
            <?php endforeach?>
        </select>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" Name="nama">
    </div>
    <div class="form-group">
        <label>Price (Rp.)</label>
        <input type="Number" class="form-control" Name="harga">
    </div>
    <div class="form-group">
        <label>Weight (GR)</label>
        <input type="number" class="form-control" Name="berat">
    </div>
    <div class="form-group">
        <label>Stock</label>
        <input type="number" class="form-control" Name="stok">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Photo</label>
        <div class="letak-input" style="margin-bottom: 10px; ">
            <input type="file" class="form-control" Name="foto[]"><br>
        </div>
            <span class="button btn-warning btn-sm text-white"><i class="fa fa-plus"></i>
        </span>
    </div>
    <button class="btn btn-primary" name="simpan">SAVE</button>
</form>


<?php 

if (isset($_POST['simpan']))
{
    $namanamafoto = $_FILES['foto']['name'];
    $lokasilokasifoto = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasilokasifoto[0], "../admin/fotoproduk/".$namanamafoto[0]);
    $koneksi->query("INSERT INTO produk(nama_produk, harga_produk, berat_produk, foto_produk,stok_produk, deskripsi_produk,id_kategori) VALUES ('$_POST[nama]', '$_POST[harga]', '$_POST[berat]', '$namanamafoto[0]', '$_POST[stok]', '$_POST[deskripsi]', '$_POST[id_kategori]')");

    $id_produk_barusan = $koneksi->insert_id;

    foreach ($namanamafoto as $key => $tiap_nama)
    {
        $tiap_lokasi = $lokasilokasifoto[$key];

        move_uploaded_file($tiap_lokasi, "../admin/fotoproduk/".$tiap_nama);

        $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto) VALUES ('".$id_produk_barusan."', '".$tiap_nama."')");
    }


   // echo "<div class='alert alert-info'>Data Saved</div>";
    //echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'";

    //echo "<pre>";
    //print_r($_FILES["foto"]);
    //echo "</pre>";
}
?>

<script>
    $(document).ready(function(){
        $(".btn-sm").on("click",function(){
            $(".letak-input").append("<input type='file' class='form-control' Name='foto[]'>");
        })
    })
</script>
