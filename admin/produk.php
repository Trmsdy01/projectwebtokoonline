<div class="judul-kategori" style="background-color: #fff; padding: 5px 10px">
    <h4 class="text-center mt-2" style="font-size: 35px; font-weight: 850;">PRODUK</h4>
    <hr>
</div>

<table  class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Foto</th>
            <th>Dekripsi</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori"); ?>
        <?php while($pecah = $ambil-> fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_kategori']; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo $pecah['harga_produk']; ?></td>
            <td><?php echo $pecah['berat_produk']; ?> gr</td>
            <td>
                <img src="fotoproduk/<?php echo $pecah['foto_produk']; ?>" width="100">
            </td>
            <td><?php echo $pecah['deskripsi_produk']; ?></td>
            <td><?php echo $pecah['stok_produk']; ?></td>
            
            <td>
                <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-danger" onclick="return confirm('are you sure you want to delete?')">HAPUS</a>
                <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-warning">EDIT</a>
                <a href="index.php?halaman=detailproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-info">DETAIL</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>

<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Add Product</a>