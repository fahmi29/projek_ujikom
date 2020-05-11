<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../asset/DataTable/css/jquery.dataTables.css">

<form method="post">
<div class="col-md-4" style=" background-color: transparent;">
	<?php 
	mysql_query("UPDATE disposition set notification = 'b' where id = '$_GET[id]'");
	$sql = mysql_query("SELECT * from disposition where id = '$_GET[id]'");
	while ($t = mysql_fetch_array($sql)) {
		echo mysql_error();
	 ?>
	<div class="card" style="border-color: transparent; background-color: transparent; ">
		<h5><?php 
		$id =  $t[7]; 
		$yup = mysql_query("SELECT * from user where id='$id'");
		while ($s=mysql_fetch_array($yup)) {
			
		?>Surat Dari : <?php echo $s[4]; ?></h5>
		<?php } ?>	
			<!-- <input type="text" name="no" value="" style="border-color: transparent; background-color: transparent;" readonly> -->
	</div>
</div>			

<div class=" offset-lg-8" style="margin-top: -2.7%; background-color: transparent;">
	<div class="card" style="border-color: transparent; background-color: transparent;">
		<h5 style="margin-left: 60%;">Tanggal Surat : <?php echo $t[1]; ?></h5>
			<!-- <input type="text" name="no" style="border-color: transparent; background-color: transparent;" readonly> -->
	</div>
</div>

<div class="card" style="height: 30em; background-color: transparent;">
	<div class="col-md-6 offset-lg-9">
	<p><b>Subjek : <?php echo $t[5]; ?></b></p>
	</div>
	<div class="col-md-8 offset-lg-2" style="margin-top: -5%;">
		<center><p><?php echo $t[3]; ?></p></center>
	</div>
</div><br>
<div class="card">
	<?php
		$id = $t[6]; 
		// include '../../config/konek.php';
		$sql = mysql_query("SELECT * from mail where id = '$id'");
		while ($r = mysql_fetch_array($sql)) {
		
	?>
	<div class="card-header"><h5>Lampiran File</h5></div>
	<a href="../download/download.php?id='<?php echo $r[0] ?>'"><?php echo $r[9]; ?></a>
</div>
<?php } ?>
	<?php } ?>

</form>

<script type="text/javascript" src="../asset/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../asset/js/popper.js"></script>
<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../asset/DataTable/js/jquery.dataTables.min.js"></script>