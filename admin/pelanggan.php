<center><h2>PELANGGAN</h2></center>
<hr>

<table  class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Hapus</th>
            <th>EDIT</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
        <?php while($pecah = $ambil-> fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['email_pelanggan']; ?></td>
            <td><?php echo $pecah['telepon_pelanggan']; ?></td>
            <td>
                <a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan'];?>" class="btn btn-danger" onclick="return confirm('are you sure you want to delete?')">HAPUS</a>
            </td>
            <td>
                <a href="index.php?halaman=ubahpelanggan&id=<?php echo $pecah['id_pelanggan'];?>" class="btn btn-warning">EDIT</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>

<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary">Add Costumer</a>