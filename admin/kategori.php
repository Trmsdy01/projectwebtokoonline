<?php 
$semuadata=array();
$ambil=$koneksi->query("SELECT * FROM kategori");
while ($tiap=$ambil->fetch_assoc())
{
    $semuadata[]=$tiap;
}

//echo "<pre>";
//print_r($semuadata);
//echo "</pre>";
?>

<div class="judul-kategori" style="background-color: #fff; padding: 5px 10px">
    <h4 class="text-center mt-2" style="font-size: 35px; font-weight: 850;">KATEGORI</h4>
    <hr>
</div>


<table  class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php foreach ($semuadata as $key => $value):?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $value["nama_kategori"]; ?></td>
            <td>
                <a href="#" class="btn btn-danger" onclick="return confirm('are you sure you want to delete?')">HAPUS</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php endforeach ?>
    </tbody>
</table>

<a href="index.php?halaman=tambahkategori" class="btn btn-primary">Add Category</a>
