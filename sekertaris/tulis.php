<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../asset/DataTable/css/jquery.dataTables.css">

<table class="table">
	<thead><h4>Tulis Surat baru</h4></thead>
	<form method="post" enctype="multipart/form-data">
		<tr>
		 	<td>Surat</td>
		 	<td>
		 		<select name="stat" class="form-control" onchange="submit()" required="">
		 			<option required>--Pilih--</option>
		 			<?php
		 				if (isset($_POST['stat'])) {
		 					if ($_POST['stat'] == 'in') {
		 						$in = 'selected';
		 						$out = '';
		 					}else{
		 						$in = '';
		 						$out = 'selected';
		 					}
		 				}else{
		 					$in = '';
		 					$out = '';
		 				}
		 			?>
		 			<option value="in" <?=$in?>>Masuk</option>
		 			<option value="out" <?=$out?>>Keluar</option>
		 		</select>
		 	</td>
		 </tr>
	<tr>
		<?php if (isset($_POST['stat']) and $_POST['stat']=="out") {
			echo "<td>Tanggal Surat Keluar</td>";		
		} else{
			echo "<td>Tanggal Surat Datang</td>";
		}?>
		<td><input type="date" class="form-control" name="tgl" required=""></td>
	</tr>
	<tr>
		
		<td>Nomor Surat</td>
		<td><input type="text" name="code" class="form-control" required=""></td>
	</tr>
	<tr>
		<td>Tangal Surat</td>
		<td><input type="date" name="date" class="form-control" required=""></td>
	</tr>
	<tr>
		<td>Surat Dari</td>
		<?php if (isset($_POST['stat']) and $_POST['stat']=="out") {
			echo "<td><input type='text' name='from' class='form-control' readonly value='RhiVoEh'></td>";		
		} else{
			echo "<td><input type='text' name='from' class='form-control' required=''></td>";
		}?>
	</tr>
	<tr>
		<td>Surat Untuk</td>
		<?php 
			if (isset($_POST['stat']) and $_POST['stat']== "in") {
				echo "<td><input type='text' name='to' class='form-control' readonly value='RhiVoEh'></td>";
			}else{
				echo "<td><input type='text' name='to' class='form-control' required=''></td>";
			}
		 ?>
		
	</tr>
	<tr>
		<td>Subjek Surat</td>
		<td><input type="text" name="sub" class="form-control" required=""></td>
	</tr>
	<tr>
		<td>Deskripsi Surat</td>
		<td><input type="text" name="descrip" class="form-control" required=""></td>
	</tr>
	<tr>
		<td>File</td>
		<td><input type="file" name="upload" class="form-control" required="">
			<p class="alert-danger" style="color: red;"></p>

		</td>
	</tr>
	<tr>
		<td>Jenis Surat</td>
		 <td>
		 	
		 	<select name="tipe" class="form-control" required="">
		 		<option>--- Pilih Jenis Surat ---</option>
		 		<?php 
		 	$sql  = mysql_query("SELECT * from mail_type");
		 	while ($a = mysql_fetch_array($sql)) {
		 		echo "<option value='$a[0]'>$a[1]</option>";
		 		}
		 ?>
		 	</select>
		 </td>
		 
		 <tr>
		<td colspan="2">
			<!-- <button class="btn btn-outline-primary" style="float: right;" name="send"><i class="fa fa-paper-plane"></i> Upload Surat</button> -->
			<input type="submit" class="btn btn-outline-primary" style="float: right;" name="send" value="Upload">
		</td>
		 </tr>
	</tr>
	</form>
</table>

<script type="text/javascript" src="../asset/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../asset/js/popper.js"></script>
<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../asset/DataTable/js/jquery.dataTables.min.js"></script>