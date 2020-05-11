<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../asset/DataTable/css/jquery.dataTables.css">

<table id="myTable" class="table" cellspacing="0" width="100%">
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
		
		$no = 0;
		$sql = mysql_query("SELECT * from disposition where reply_at = '$_SESSION[fullname]'");
		while ($r = mysql_fetch_array($sql)) {
			$no++;
		 ?>
		 <form method="post">
		 	<?php 
		 	if ($r[4] == 'r') {
		 	 ?>
		<tr>
			<td style="width: 40px;"><?php echo $no; ?></td>
			<?php 
			$id = $r[7];
			$to = mysql_query("SELECT * from user where id ='$id'");
			while ($a = mysql_fetch_array($to)) {
			 ?>
			<td><?php echo $a[1]; ?></td>
			<?php } ?>
			<td><?php echo $r[5]; ?></td>
			<td><div class="col-md-10"><?php echo $r[3]; ?></div></td>
			<td style="text-align: right;"><?php echo $r[1] ?></td>
			<td style="text-align: right;">
				<a href="?menu=buka&id=<?php echo $r[0]?>" name="buka" class="btn btn-outline-success" title="Buka Pesan"><i class="fa fa-envelope"></i></a>
				<a href="?menu=masuk&hapus&id=<?php echo $r[0] ?>" name="hapus" class="btn btn-outline-danger" title="Hapus Pesan"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php }else {?>
		<tr style="background-color: #eee">
			<td style="width: 40px;"><?php echo $no; ?></td>
			<?php 
			$id = $r[7];
			$to = mysql_query("SELECT * from user where id ='$id'");
			while ($a = mysql_fetch_array($to)) {
			 ?>
			<td><?php echo $a[1]; ?></td>
			<?php } ?>
			<td><?php echo $r[5]; ?></td>
			<td><div class="col-md-10"><?php echo $r[3]; ?></div></td>
			<td style="text-align: right;"><?php echo $r[1] ?></td>
			<td style="text-align: right;">
				<a href="?menu=buka&id=<?php echo $r[0]?>" name="buka" class="btn btn-outline-success" title="Buka Pesan"><i class="fa fa-envelope-open"></i></a>
			</td>
		</tr>
		<?php } ?>
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
		//setInterval(function(){getRealData()},1000)
	});

	// function getRealData(){
	// 	$.ajax({
	// 		url:"masuk.php",
	// 		type:"post",
	// 		data{
	// 			name:name
	// 		},
	// 		cache:false,
	// 		success: function(){

	// 		}
	// 	})
	// }
</script>