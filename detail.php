<h2>Detail Pembelian</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM pemesanan JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan WHERE pemesanan.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<!-- <pre><?php //print_r($detail); 
			?></pre> -->

<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
			<strong>Total : <?php echo $detail['total_pemesanan']; ?></strong> <br>
			Tanggal : <?php echo $detail['tanggal_pemesanan']; ?><br>
			Pembayaran : <?php echo $detail['nama_kota']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<p>
			<strong>Nama : <?php echo $detail['nama_pelanggan']; ?></strong> <br>
			Nomor Telepon : <?php echo $detail['telepon_pelanggan']; ?>
		</p>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pemesanan_produk JOIN produk ON pemesanan_produk.id_produk=produk.id_produk WHERE pemesanan_produk.id_pembelian='$_GET[id]' "); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama_produk']; ?></td>
				<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
				<td><?php echo $pecah['jumlah']; ?></td>
				<td>
					Rp. <?php echo number_format($pecah['harga_produk'] * $pecah['jumlah']); ?>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>