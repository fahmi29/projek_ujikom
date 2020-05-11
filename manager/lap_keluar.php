<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../asset/DataTable/css/jquery.dataTables.css">

<table id="myTable" class="display" cellspacing="0" width="100%">
	<thead>
		<th>No</th>
		<th>Surat Dari</th>
		<th>Subjek</th>
		<th>Deskripsi</th>
		<th>Tanggal Surat</th>
		<th>Aksi</th>
	</thead>

	<tbody>
		<?php 
		// include '../config/konek.php';
		$no = 0;
		$sql = mysql_query("SELECT * from mail where status = 'out'");
		while ($r = @mysql_fetch_array($sql)) {
			$no++;
		 ?>
		<tr>
			<td style="width: 40px;"><?php echo $no; ?></td>
			<td><?php echo $r[4]; ?></td>
			<td><?php echo $r[6]; ?></td>
			<td><div class="col-md-10"><?php echo $r[7]; ?></div></td>
			<td style="width: 30px;"><?php echo $r[1] ?></td>
			<td style=" text-align: right;">
				<a href="?menu=buka&id=<?php echo $r[0]?>" name="buka" class="btn btn-outline-success"><i class="fa fa-envelope-open"></i></a>
				<!-- <a href="print2.php?id=<?= $r[0] ?>" target="_blank" name="print" class="btn btn-outline-info" title="Print"><i class="fa fa-print"></i></a> -->
			</td>
		</tr>
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