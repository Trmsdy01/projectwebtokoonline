<center><h2>ADD CATEGORY</h2></center>
<hr>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" Name="nama">
    </div>
    <button class="btn btn-primary" name="save">SAVE</button>
</form>

<?php 
if (isset($_POST['save']))
{
    $koneksi->query("INSERT INTO kategori(nama_kategori)VALUES ('$_POST[nama]')");

    echo "<div class='alert alert-info'>SAVED</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
}
?>