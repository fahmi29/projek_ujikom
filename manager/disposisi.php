
<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../asset/DataTable/css/jquery.dataTables.css">
	
			<form method="post">
				<table class="table">
					<tr>
						<td><label>Tanggal Disposisi</label></td>
						<td>
							<div class="input-group">
					
					<div class="input-group-addon" >
						<span><i class="fa fa-calendar"></i></span>
					</div>
					<input type="text" name="tgl" class="form-control" readonly value="<?php echo date('m/d/Y') ?>">
				</div>
						</td>
					</tr>
					<tr>
						<td><label>Disposisikan Ke</label></td>
						<td>
				<div class="card">
					<p>Kepala Bagian : </p>
						<div class="" style="width: 100%;">
								<style type="text/css">
									input[type=checkbox]{
										margin-right: 10px;
									}
								</style>
							<div class="" style="margin-left: 10%;">
								<?php 
								 mysql_query("UPDATE mail set stat = 'r' where id = '$_GET[id]'");
									
								$sql = mysql_query("SELECT * from user where level = 'pegawai'");
									
								while ($r = mysql_fetch_array($sql)) {
									
								 ?>
								 <input type="checkbox" name="chk[]" value="<?= $r[1] ?>"><?= $r[1] ?>
								 <?php } ?>
							</div>
					</div>
				</div>
				</td>
					</tr>
					<tr>
						<td><label>Description</label></td>
						<td>
							<div class="input-group" >
									<div class="input-group-addon">
										<span><i class="fa fa-rocket"></i></span>
									</div>
								<input type="text" name="desk" class="form-control" required="">
							</div>
						</td>
					</tr>
					<tr>
						<td><label>Status</label></td>
						<td>
							<div class="input-group" >
									<select name="noti" class="form-control" required="">
										<option>----Pilih----</option>
										<option value="Penting">Penting</option>
										<option value="Rahasia">Rahasia</option>
										<option value="Wajib Dilaksanakan">Wajib Dilaksanakan</option>
									</select>
							</div>
						</td>
					</tr>
					<tr>
						<td><input type="hidden" name="stat" value="r"></td>
					</tr>
					<tr>
						<td></td>
						<td style="float: right;"><button class="btn btn-outline-primary" name="boa" style=""><i class="fa fa-paper-plane"></i>Kirim</button></td>
					</tr>
				</table>
					<input type="hidden" name="id" value="<?php echo md5($_GET['id']); ?>">

			</form>
	
<script type="text/javascript" src="../asset/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../asset/js/popper.js"></script>
<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../asset/DataTable/js/jquery.dataTables.min.js"></script>