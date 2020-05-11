<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../asset/DataTable/css/jquery.dataTables.css">

<table id="myTable" class="display" cellspacing="0" width="100%">
	<thead>
		<th>No</th>
		<th>Surat Dari</th>
		<th>Subjek</th>
		<th>Deskripsi</th>
		<th style="text-align: right;">Tanggal Surat</th>
		<th style="text-align: right;">Aksi</th>
	</thead>

	<tbody>
		<?php
		if (isset($_GET['hapus'])) {
			mysql_query("DELETE from mail where id = '$_GET[id]'");
		}
		if (isset($_GET['backup'])) {
			mysql_query("UPDATE mail set confirm='b' where id = '$_GET[id]'");
		}
		$no = 0;
		$sql = mysql_query("SELECT * from mail where status='out' and confirm='t'");
		while ($r = mysql_fetch_array($sql)) {
			$no++;
		 ?>
		 <form method="post">
		<tr>
			<td style="width: 40px;"><?php echo $no; ?></td>
			<td><?php echo $r[4]; ?></td>
			<td><?php echo $r[6]; ?></td>
			<td><div class="col-md-10"><?php echo $r[7]; ?></div></td>
			<td style="text-align:right;"><?php echo $r[1] ?></td>
			<td style="text-align: right;"><a href="?menu=buka&id=<?php echo $r[0]?>" name="buka" class="btn btn-outline-success"><i class="fa fa-envelope-open"></i></a>
				<a href="?menu=keluar&hapus&id=<?php echo $r[0] ?>" name="hapus" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
				<a href="?menu=keluar&backup&id=<?= $r[0]  ?>" name="backup" class="btn btn-outline-warning" title="Backup"><i class="fa fa-undo"></i></a>
			</td>
		</tr>
		</form>
		<?php } ?>
	</tbody>
</table>


<script type="text/javascript" src="../asset/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../asset/js/popper.js"></script>
<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../asset/DataTable/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable').DataTable();
	});
</script>
