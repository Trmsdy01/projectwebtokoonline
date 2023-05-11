<h2>EDIT COSTUMER</h2>

<?php
$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";

?>


<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" Name="nama" value="<?php echo $pecah['nama_pelanggan']?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" Name="email" value="<?php echo $pecah['email_pelanggan']?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" Name="password" value="<?php echo $pecah['password_pelanggan']?>">
    </div>
    <div class="form-group">
        <label>No.Tlp</label>
        <input type="text" class="form-control" Name="tlp" value="<?php echo $pecah['telepon_pelanggan']?>">
    </div>
    <button class="btn btn-primary" name="ubah">EDIT</button>
</form>

<?php 
if (isset($_POST['ubah']))
{

        $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]', 
        email_pelanggan='$_POST[email]', password_pelanggan='$_POST[password]', 
        telepon_pelanggan='$_POST[tlp]' WHERE id_pelanggan='$_GET[id]'");

        echo "<script>alert('Successfully Edited')</script>";
        echo "<script>location='index.php?halaman=pelanggan';</script>";
}
?>