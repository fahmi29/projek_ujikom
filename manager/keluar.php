<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../asset/DataTable/css/jquery.dataTables.css">

<table id="myTable" class="display" cellspacing="0" width="100%">
	<thead>
		<th>No</th>
		<th>Surat Dari</th>
		<th>Subjekl</th>
		<th>Deskripsi</th>
		<th>Status</th>
		<th>Tanggal Surat</th>
		<th>Aksi</th>
	</thead>

	<tbody>
		<?php 
		if (isset($_GET['hapus'])) {
			mysql_query("DELETE from disposition where id ='$_GET[id]'");
		}
		if (isset($_GET['backup'])) {
			mysql_query("UPDATE disposition set stat = 't' where id = '$_GET[id]'");
		}
		$no = 0;
		$sql = mysql_query("SELECT * from disposition where stat = 's'");
		while ($r = mysql_fetch_array($sql)) {
			$no++;
		 ?>
		<tr>
			<td style="width: 40px;"><?php echo $no; ?></td>
			<td><?php echo $r[2]; ?></td>
			<td><?php echo $r[5]; ?></td>
			<td><div class="col-md-10"><?php echo $r[3]; ?></div></td>
			<?php if ($r[4] == 'r') {	
			 ?>
			 <td>Belum Dibaca</td>
			 <?php 
			}else{
			  ?>
			<td>Sudah Dibaca</td>
			<?php } ?>
			<td style="width: 30px;"><?php echo $r[1] ?></td>
			<td style="width: 30px;">
			<a href="?menu=disposisi1&hapus&id=<?php echo $r[0];?>" name="hapus" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
			<a href="?menu=disposisi1&backup&id=<?= $r[0]  ?>" name="backup" class="btn btn-outline-warning" title="Backup"><i class="fa fa-undo"></i></a>
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