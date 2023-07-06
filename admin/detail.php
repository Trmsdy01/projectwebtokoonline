
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
    <div class="judul-kategori" style="background-color: #fff; padding: 5px 10px">
    <h4 class="text-center mt-2" style="font-size: 35px; font-weight: 500;">DETAIL PEMESANAN PRODUK</h4>
    </div>
    <div class="row">
        <div class="col-md-4">
        <h3><b>PEMBELIAN</b></h3>
        <strong>No. Pembelian <?php echo number_format($detail['id_pembelian']);?></strong> <br>
        Tanggal Pembelian : <?php echo ($detail['tanggal_pembelian']);?> <br>
        Total : Rp. <?php echo number_format($detail['total_pembelian']);?>
        </div>
        <div class="col-md-4">
        <h3><b>PELANGGAN</b></h3>
        <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
            No.Telp : <?php echo $detail['telepon_pelanggan']; ?><br>
            Email : <?php echo $detail['email_pelanggan']; ?>
        </div>
        <div class="col-md-4">
        <h3><b>PENGIRIMAN</b></h3>
        <strong><?php echo $detail['tipe'];?> <?php echo $detail['distrik'];?>, <?php echo $detail['provinsi'];?></strong> <br>
        Ekspedisi : <?php echo $detail['ekspedisi'];?><br>
        Estimasi : <?php echo $detail['estimasi'];?> Hari<br>
        Ongkos Kirim : Rp. <?php echo number_format($detail['ongkir']);?><br>
        Alamat : <?php echo $detail['alamat_pengiriman']?>
        </div>
    </div>
    <br>
<table class="table table-bordered">
<thead class="table-secondary">
    <tr>
        <th>No</th>
        <th>Nama produk</th>
        <th>Harga</th>
        <th>Berat</th>
        <th>Jumlah</th>
        <th>Sub Berat</th>
        <th>Sub Total</th>
    </tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");?>
    <?php while($pecah=$ambil->fetch_assoc()) {?>
    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $pecah['nama']; ?></td>
        <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
        <td><?php echo $pecah['berat'];?> Gr.</td>
        <td><?php echo $pecah['jumlah']; ?></td>
        <td><?php echo $pecah['subberat']; ?> Gr.</td>
        <td>Rp. <?php echo number_format($pecah['subharga'] ); ?></td>
    </tr>
    <?php $nomor++; ?>
    <?php }?>
    </tbody>
</table>