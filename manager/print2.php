<?php 
	include '../config/konek.php';
 ?>
<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.min.css">
<body onload="window.print()">
	<nav class="navbar navbar-light" style="background-color: rgba(191, 191, 191,0);border-bottom: 1px solid green;">
		<a class="navbar-brand" style=""><img src="../asset/img/logorhivoeh.png" alt="" style="width: 70px; height: 70px; float: left;">
			<p style="font-size: 15px;">RhiVoEh <br>
			Jl. Padjajaran No.15 <br>
			E-mail : rhivoeh@gmail.com telp : (0251)-8090-1000
			</p>
		</a> 
	</nav><br>
	<style type="text/css">
		input[type=text]{
			border: none;
		}	
	</style>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header"><h5>Surat Masuk</h5></div>
				<div class="card-body">
					<table class="table" style="">
						<?php 
							$t = mysql_query("SELECT * from mail where id = '$_GET[id]'");
							while ($e = mysql_fetch_array($t)) {
						 ?>
						<tr>
							<td>Tanggal Surat Keluar</td>
							<td>:</td>
							<td><input type="text" readonly="" class="form-control" style="background: transparent;" value="<?= $e[1] ?>" name="" ></td>
						</tr>
						<tr>
							<td>Kode Surat</td>
							<td>:</td>
							<td><input type="text" readonly="" class="form-control" style="background: transparent;" value="<?= $e[2] ?>" name=""></td>
						</tr>
						<tr>
							<td>Tanggal Surat</td>
							<td>:</td>
							<td><input type="text" readonly="" class="form-control" style="background: transparent;" value="<?= $e[3] ?>" name=""></td>
						</tr>
						<tr>
							<td>Surat Untuk</td>
							<td>:</td>
							<td><input type="text" readonly="" class="form-control" style="background: transparent;" value="<?= $e[5] ?>" name=""></td>
						</tr>
						<tr>
							<td>Subjek Surat</td>
							<td>:</td>
							<td><input type="text" readonly="" class="form-control" style="background: transparent;" value="<?= $e[6] ?>" name=""></td>
						</tr>
						<tr>
							<td>Deskripsi Surat</td>
							<td>:</td>
							<td><input type="text" readonly="" class="form-control" style="background: transparent;" value="<?= $e[7] ?>" name=""></td>
						</tr>
						<tr>
							<?php 
								$id = $e[12];
								$r = mysql_query("SELECT * from mail_type where id = '$id'");
								while ($d = mysql_fetch_array($r)) {
							 ?>
							<td>Jenis Surat</td>
							<td>:</td>
							<td><input type="text" readonly="" class="form-control" style="background: transparent;" value="<?= $d[1]  ?>" name=""></td>
							<?php } ?>
						</tr>
						<tr>
							<?php 
								$i = $e[13];
								$a = mysql_query("SELECT * from user where id = '$i'");
								while ($h = mysql_fetch_array($a)) {
							 ?>
							<td>Dikirim Oleh</td>
							<td>:</td>
							<td><input type="text" readonly="" class="form-control" style="background: transparent;" value="<?= $h[1]  ?>" name=""></td>
							<?php } ?>
						</tr>
					</table>
					<?php } ?>

				</div>	
		</div>
	</div>

</body>
<script type="text/javascript" src="../asset/js/popper.js"></script>
<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../asset/js/jquery-3.2.1.min.js"></script>