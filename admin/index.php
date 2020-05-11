<?php 
	include '../config/konek.php';
if (!isset($_SESSION['username'])) {
		// echo "<script>alert('Anda Belum Login');document.location.href='../index.php'</script>";
		header('location:../index.php');
	}
	if ($_SESSION['level'] != "Admin") {
		echo "<script>alert('Anda Bukan Sekertaris');document.location.href='index.php'</script>";
		// mysql_error();
	}
	if (isset($_POST['tambah'])) {
		$upload = addslashes(file_get_contents($_FILES['up']['tmp_name']));
		$sql = mysql_query("INSERT into user values(null,'$_POST[full]','$_POST[user]','$_POST[pass]','$_POST[level]','$upload','".$_FILES['up']['name']."','$_POST[jk]')");
		if ($sql == true) {
			echo "<script>alert('Berhasil Ditambah');document.location.href='index.php'</script>";
		}else {
			echo "<script>alert('Gagal Jangan Ada Data Kosong')'</script>";
			// mysql_error();
		}
		// if ($_POST['user'] == true) {
		// 	echo "<script>alert('Data Sudah Tersedia');document.location.href='index.php'</script>";
		// }
	}
	if (isset($_GET['edit'])) {
		$sql = mysql_query("SELECT * from user where id = '$_GET[id]'");
		@$edit = mysql_fetch_array($sql);
	}
	if (isset($_POST['update'])) {
		$upload = addslashes(file_get_contents($_FILES['up']['tmp_name']));
		$lost = mysql_query("UPDATE user set  id = '$_GET[id]', fullname = '$_POST[full]', username = '$_POST[user]', password = '$_POST[pass]', level = '$_POST[level]', image = '$upload', image_name = '".$_FILES['up']['name']."', jk = '$_POST[jk]' WHERE id = '$_GET[id]'");
		if ($lost) {
			echo "<script>alert('Berhasil DiUpdate');document.location.href='index.php'</script>";
		}else{
			echo "<script>alert('Berhasil DiUpdate DiUpdate Jangan Ada Data Kosong')</script>";
			// mysql_error();
		}
		// if ($_POST['user'] == true) {
		// 	echo "<script>alert('Data Sudah Tersedia');document.location.href='index.php?edit&id=$_GET[id]'</script>";
		// }else{
		// 	mysql_error();
		// }
	}
	if (isset($_GET['hapus'])) {
		mysql_query("DELETE from user where id = '$_GET[id]'");
		echo "<script>alert('Berhasil Di Hapus');document.location.href='index.php'</script>";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/DataTable/css/jquery.dataTables.min.css">
</head>
<body style="background-image: url(../asset/img/background.jpg);">
	<nav class="navbar navbar-light" style="background-color: #eee;">
		<a class="navbar-brand" href="#" style="S"><img src="../asset/img/logorhivoeh.png" alt="" style="width: 40px; height: 40px;"> RhiVoEh</a>
		
			<?php 
					 	$id = $_SESSION['user_id'];
						$sql = mysql_query("SELECT * FROM user where id ='$id'");
						$select = mysql_fetch_array($sql);
						// header("Content-type:image/png");
						echo '<img src="data:image/jpeg;base64,'.base64_encode($select['image']).'" style="width:40px; height:40px; border-radius:50%; margin-right:0px;" id="dropdownMenuButton" data-toggle="dropdown" class="btn-outline-warning">';
					?>
			<div class="dropdown-menu" arialabelledby="dropdownMenuButton" style="margin-left: 82%; border-color: transparent; width: 17%;">
				<!-- <div class="rucing" arialabelledby="dropdownMenuButton" style="margin-left: 81%; top: -9%;"></div> -->
				<ul style="border-bottom: 1px solid #e5e5e5; margin-top: 5%;">
					 <?php 
					 	$id = $_SESSION['user_id'];
						$sql = mysql_query("SELECT * FROM user where id ='$id'");
						$select = mysql_fetch_array($sql);
						// header("Content-type:image/png");
						echo '<img src="data:image/jpeg;base64,'.base64_encode($select['image']).'" style="width:60px; height:60px; border-radius:50%; margin-right:20px;">';
					 echo $_SESSION['fullname']; ?>
				</ul>
				<a href="../config/konek.php?op=out" class="btn btn-danger" style="float: right; margin-right: 3%;" ><i class="fa fa-power-off"></i></a>
			</div>

	</nav><br><br>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"">
				<div class="card" style="width: 106%;">
					<div class="card-header"><h4>Tambah User <i class="fa fa-user-plus"></i></h4></div>
					<div class="card-body">	
						<form method="post" enctype="multipart/form-data">
					<div class="input-group">
						<!-- <label style="margin-right: 20px;">Username</label> -->
						<div class="input-group-addon">
							<span><i class="fa fa-user-circle"></i></span>
						</div>
						<input type="text" class="form-control" name="full" value="<?= @$edit[1];  ?>" placeholder="Masukan Fullname" required>
					</div><br>

					<div class="input-group">
						<div class="input-group-addon">
							<span><i class="fa fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="user" value="<?= @$edit[2];  ?>" placeholder="Masukan Username" required>
					</div><br>
					
					<div class="input-group">
						<div class="input-group-addon">
							<span><i class="fa fa-key"></i></span>
						</div>
						<input type="text" class="form-control" name="pass" value="<?= @$edit[3];  ?>" placeholder="Masukan Password" required>
					</div><br>
					
					<div class="input-group">
						<div class="input-group-addon">
							<span><i class="fa fa-users"></i></span>
						</div>
						<select name="level" id="" class="custom-select form-control" required>
							<option value="" required>--Pilih---</option>
							<?php 
								if (@$edit[4] == "Manager") {
									$m = 'selected';
									$s = '';
									$p = '';
								}elseif (@$edit[4] == 'Sekertaris' ) {
									$m = '';
									$s = 'selected';
									$p = '';
								}elseif (@$edit[4] == 'Pegawai') {
									$m = '';
									$s = '';
									$p = 'selected';
								}else{
									$m = '';
									$s = '';
									$p = '';
								}
							 ?>
							<option value="Manager" <?= $m ?>>Manager</option>
							<option value="Sekertaris" <?= $s ?>>Sekertaris</option>
							<option value="Pegawai" <?= $p ?>>Pegawai</option>
						</select>
					</div><br>

					<div class="input-group">
						<!-- <div class="input-group-addon">
							<i class="fa fa-male"></i>
						</div> -->
						<div class="input-group">
							<?php 
							if (@$edit[7] == 'L') {
								$l = 'checked';
								$p = '';
							}elseif (@$edit[7] == 'P') {							
								$l = '';
								$p = 'checked';
							}else{
								$l = '';
								$p = '';
							}
							 ?>
						<input type="radio" name="jk" value="L" <?= $l ?> required>Laki-Laki
						</div>
						<div class="input-group">
							<input type="radio" name="jk" value="P" <?= $p ?> required>Perempuan
						</div>
					</div><br>

					<div class="input-group">
						<div class="input-group-addon">
							<span><i class="fa fa-file"></i></span>
						</div>
						<input type="file" class="form-control" name="up" value="<?= @$edit[6] ?>" required>
					</div><br>

					<div class="input-group">
						<?php 
							if (isset($edit)) {
						 ?>
					<button class="btn btn-outline-primary" name="update" style="margin-left: 57%;"><i class="fa fa-plus"></i> Update User</button>
						<?php }else {
						 ?>
					<button class="btn btn-outline-primary" name="tambah" style="margin-left: 53%;"><i class="fa fa-user-plus"></i> Tambah User</button>
					<?php } ?>
					</form>	
					</div>
					</div>
				</div>
			</div>

			<div class="card" style="margin-left: 1%;">
			<div class="card-header"><h5>User <i class="fa fa-users"></i></h5></div>
		<div class="card-body">
			<table class="table-hover" id="table">
				<thead>
					<th>No</th>
					<th>Fullname</th>
					<th>Username</th>
					<th>Password</th>
					<th>Level</th>
					<th>Foto</th>
					<th>Jenis Kelamin</th>
					<th>Aksi</th>
				</thead>

				<tbody>
					<?php 
					$no = 0;
						$sql = mysql_query("SELECT * from user where level = 'Manager' or level = 'Sekertaris' or level = 'Pegawai'");
						while ($a = mysql_fetch_array($sql)) {
						    $no++;
					 ?>
					<tr>
						<td><?= $no; ?></td>
						<td><?= $a[1]; ?></td>
						<td><?= $a[2]; ?></td>
						<td><?= $a[3]; ?></td>
						<td><?= $a[4]; ?></td>
						<td><?= '<img src="data:image/jpeg;base64,'.base64_encode($a['image']).'" style="width:60px; height:60px; border-radius:50%; margin-right:20px;">' ?></td>
						<td><center><?= $a[7]; ?></center></td>
						<td>
							<a href="?edit&id=<?= $a[0]; ?>" class="btn btn-outline-primary"><i class="fa fa-pencil"></i></a>
							<a href="?hapus&id=<?= $a[0] ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>

			</table>
		</div>
	</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="../asset/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../asset/js/popper.js"></script>
<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../asset/DataTable/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
</html>