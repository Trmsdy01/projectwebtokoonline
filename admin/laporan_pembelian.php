<?php 
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";
$status = "";

if (isset($_POST["kirim"]))
{
    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST["tgls"];
    $status = $_POST["status"];
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE status_pembelian = '$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
    while($pecah = $ambil->fetch_assoc())
    {
        $semuadata[] =$pecah;
    }
}
?>

<div class="judul-kategori" style="background-color: #fff; padding: 5px 10px">
    <h4 class="text-center mt-2" style="font-size: 35px; font-weight: 850;">LAPORAN PEMBELIAN <?php echo $tgl_mulai?> sampai <?php echo $tgl_selesai?></h4>
    <hr>
</div>

<form method="post">
    <dic class="row">
        <div class="col-md-3">
            <label>Tanggal Mulai</label>
            <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai?>">
        </div>
        <div class="col-md-3">
            <label>Tanggal Selesai</label>
            <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai?>">
        </div>
        <div class="col-md-3">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="">Select Status</option>
                <option value="paid" <?php echo $status=="paid"?"selected":"";?>>PAID</option>
                <option value="pending" <?php echo $status=="pending"?"selected":"";?>>pending</option>
                <option value="Product are being Delivered" <?php echo $status=="Product are being Delivered"?"selected":"";?>>Product are being Delivered</option>
                <option value="cancel" <?php echo $status=="cancel"?"selected":"";?>>CANCEL</option>
            </select>
        </div>
        <div class="col-md-3"><br>
        <label>&nbsp;</label>
            <button class="btn btn-primary" name="kirim">LIHAT</button>
        </div>
    </dic>
</form>

<a href="downloadlaporan.php">Download PDF</a>
<br>
<br>

<table class="table table-striped table-hover">
    <thead class="table-secondary">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Pelanggan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Status</th>
            <th scope="col">Jumlah</th>
            
        </tr>
    </thead>
    <tbody class="align-middle">
        <?php $total=0; ?> 
        <?php foreach ($semuadata as $key => $value): ?>
        <?php $total+=$value['total_pembelian'] ?>     
        <tr>
            <th><?php echo $key+1; ?></th>
            <td><?php echo $value["nama_pelanggan"] ?>   </td>
            <td><?php echo date("d F Y", strtotime($value["tanggal_pembelian"])) ?></td>
            <td><?php echo $value["status_pembelian"] ?></td>
            <td>Rp. <?php echo number_format($value["total_pembelian"]) ?></td>
            
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Total</th>
            <th>Rp. <?php echo number_format($total) ?></th>
            
        </tr>
    </tfoot>
</table>