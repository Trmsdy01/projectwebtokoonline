<h2>TAMBAH PELANGGAN</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" Name="nama">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" Name="email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" Name="password">
    </div>
    <div class="form-group">
        <label>No.Tlp</label>
        <input type="text" class="form-control" Name="tlp">
    </div>
    <button class="btn btn-primary" name="save">SAVE</button>
</form>

<?php 
if (isset($_POST['save']))
{
    $koneksi->query("INSERT INTO pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan)VALUES ('$_POST[email]', '$_POST[password]', '$_POST[nama]', '$_POST[tlp]')");

    echo "<div class='alert alert-info'>SAVED</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>