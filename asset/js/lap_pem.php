<?php 
$halaman='?menu=lap_pem';
 ?>



				<center><h2 class="card-title">Laporan Pembayaran</h2></center>
				

				<form method="POST">
 					<center>
 						<h3 class="">filter berdasarkan</h3>
 						<label>Dari Tanggal</label>
 					<input type="date" name="tgl1" >
						<label>sampai Tanggal</label>
 					<input type="date" name="tgl2" >
 						<button name="filter">Filter</button>
 					</center>
 				


				<?php if (isset($_POST['filter'])) { ?>
				<a href="print.php?po&dari=<?= $_POST['tgl1']; ?>&sampai=<?= $_POST['tgl2'] ?>" class="btn btn-primary" target="_blank">Print</a>
				<?php }else{ ?>
								<a href="print.php?pop" class="btn btn-primary" target="_blank">Print</a>	
				<?php } ?>

				<?php if (isset($_POST['filter'])) { ?>
				<a href="print.php?excel&dari=<?= $_POST['tgl1'] ?>&sampai=<?= $_POST['tgl2'] ?>" class="btn btn-success" target="_blank">Export Excel</a>
					
				<?php }else{ ?>
				<a href="print.php?excela" class="btn btn-success" target="_blank">Export Excel</a>
				<?php } ?>
				<a href="?menu=lap_pem">refresh</a>
				</form>
				<hr>
				<table  class="table  table-bordered table-hover bg-white text-primary" id="example">
			  <thead class="table-white">
			    <tr>
			      <th>No</th>
				  <th>Tanggal</th>
			      <th>Id Pembayaran</th>
			      <th>Nama Pelanggan</th>
			      <th>Nama Agen </th>
			      <th>Bulan dan tahun</th>
			      <th>Biaya Admin</th>
			      <th>Total harga</th>
			      <th>bayar</th>
			      <th>kembalian</th>
			      <!-- <th>Tenggang waktu</th> -->
			    </tr>
			  </thead>
			  <tbody>
			  <?php 
			  $no=0;
			  if (isset($_POST['filter'])){
			  	$data=mysql_query("SELECT  pembayaran.*,pelanggan.nama,petugas.nama_petugas FROM pembayaran INNER JOIN pelanggan on pembayaran.id_pelanggan=pelanggan.id_pelanggan INNER JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas WHERE tanggal BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]'");
			  }else{
			 $data=mysql_query("SELECT  pembayaran.*,pelanggan.nama,petugas.nama_petugas FROM pembayaran INNER JOIN pelanggan on pembayaran.id_pelanggan=pelanggan.id_pelanggan INNER JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas");
			  }
			  while ($r=mysql_fetch_array($data)) {
			  	$no++;
			   ?>			  	
			  	<tr>
			  	<td><?php echo $no; ?></td>
			  	<td><?php echo $r['tanggal']; ?></td>
				<td><?php echo $r['id_bayar'];?></td>
			  	<td><?php echo $r['nama']; ?></td>
			  	<td><?php echo $r['nama_petugas']; ?></td>
			  	<td><?php echo $r['bulan_tahun']; ?></td>
			  	<td><?php echo $r['biaya_admin']; ?></td>
			  	<td><?php echo $r['total_bayar'] ?></td>
			  	<td><?php echo $r['bayar']; ?></td>
			  	<td><?php echo $r['kembalian']; ?></td>
			  	</tr>
			  	<?php } ?>
			  </tbody>

						</table>

<script>
		function printEuy(){
			window.print();
		}
	</script>