<div class="judul-kategori" style="background-color: #fff; padding: 5px 10px">
    <h4 class="text-center mt-2" style="font-size: 35px; font-weight: 850;">PEMBELIAN</h4>
    <hr>
    </div>
<br>
<table  class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Status Pembelian</th>
            <th>Total</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
        <?php while($pecah=$ambil->fetch_assoc()) {?>
        
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah ['nama_pelanggan']; ?></td>
            <td><?php echo date("d F Y", strtotime($pecah["tanggal_pembelian"])) ?></td>
            <td><?php echo $pecah ['status_pembelian']; ?></td>
            <td>Rp. <?php echo number_format($pecah ['total_pembelian']); ?></td>
            <td>
                <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">DETAIL</a>

                <?php if ($pecah['status_pembelian']!=="pending"): ?>
                <a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success">Payment</a>
                <?php endif ?>
            </td>
        </tr>
        <?php  $nomor++; ?> 
        <?php } ?>     
    </tbody>
</table>