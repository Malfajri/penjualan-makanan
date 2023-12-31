<?php include '../koneksi.php'; ?>
<h2>Data pemesanan</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Total</th>
			<th>Order</th>
			<th>Detail</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $conn->query("SELECT * FROM pemesanan JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama_pelanggan']; ?></td>
				<td><?php echo $pecah['tanggal_pemesanan']; ?></td>
				<td><?php echo $pecah['status_pemesanan']; ?></td>
				<td><?php echo $pecah['total_pemesanan']; ?></td>
				<td><?php echo $pecah['nama_kota']; ?></td>
				<td>
					<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">
						Detail</a>

					<?php if ($pecah['status_pemesanan'] !== "pending") : ?>
						<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">Bukti</a>
					<?php endif ?>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>