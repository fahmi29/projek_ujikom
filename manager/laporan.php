<?php 
	include '../config/konek.php';
	if (!isset($_SESSION['username'])) {
		echo "<script>alert('Anda Belum Login');document.location.href='../index.php'</script>";
	}
	if ($_SESSION['level'] != "Manager") {
		echo "<script>alert('Anda Bukan Sekertaris');document.location.href='index.php'</script>";
		// mysql_error();
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/DataTable/css/jquery.dataTables.min.css">
	<style type="text/css">
		body{
			overflow-x: hidden;
		}
	</style>
</head>
<body style="background-image: url('../asset/img/abstract-1517556487858-5096.jpg');">
	<nav class="navbar navbar-light" style="background-color: rgba(191, 191, 191,.6);">
		<a class="navbar-brand" href="index.php" style="color: white;"><img src="../asset/img/logorhivoeh.png" alt="" style="width: 50px; height: 50px;"> RhiVoEh</a>
		
			<?php 
					 	$id = $_SESSION['user_id'];
						$sql = mysql_query("SELECT * FROM user where id ='$id'");
						$select = mysql_fetch_array($sql);
						// header("Content-type:image/png");
						echo '<img src="data:image/jpeg;base64,'.base64_encode($select['image']).'" style="width:40px; height:40px; border-radius:50%; margin-right:0px;" id="dropdownMenuButton" data-toggle="dropdown" class="btn-outline-danger">';
					?>
			<div class="dropdown-menu" arialabelledby="dropdownMenuButton" style="margin-left: 75%; border-color: transparent; width: 25%;">
				<!-- <div class="rucing" arialabelledby="dropdownMenuButton" style="margin-left: 81%; top: -9%;"></div> -->
				<ul style="border-bottom: 1px solid #e5e5e5; margin-top: 5%;">
					 <?php 
					 	$id = $_SESSION['user_id'];
						$sql = mysql_query("SELECT * FROM user where id ='$id'");
						$select = mysql_fetch_array($sql);
						// header("Content-type:image/png");
						echo '<img src="data:image/jpeg;base64,'.base64_encode($select['image']).'" style="width:60px; height:60px; border-radius:50%; margin-right:0px;">';
					 echo $_SESSION['fullname']; ?>
				</ul>
				<a href="../config/konek.php?op=out" class="btn btn-danger" style="float: right; margin-right: 3%;" ><i class="fa fa-power-off"></i></a>
			</div>

	</nav><br>

	<div class="col-md-3">
	<div class="nav flex-column nav-pills">
		<?php 
		$p = mysql_query("SELECT count(id) as total from mail where status = 'in'"); 
		$data = mysql_fetch_assoc($p);
		?>
		<a href="?menu=masuk" class="nav-link">Laporan Surat Masuk <i>(<?= $data['total']; ?>)</i></a>
		<?php 
		$s = mysql_query("SELECT count(id) as op from mail where status = 'out'"); 
		$d = mysql_fetch_assoc($s);
		?>
		<a href="?menu=keluar" class="nav-link">Laporan Surat Keluar <i>(<?= $d['op']; ?>)</i></a>
		<?php 
		$z = mysql_query("SELECT count(id) as al from disposition"); 
		$a = mysql_fetch_assoc($z);
		?>
		<a href="?menu=disposisi" class="nav-link">Laporan Surat Disposisi <i>(<?= $a['al'] ?>)</i></a>
	</div>
	</div>
	<div class="col-md-9 offset-lg-3" style="background-color: rgba(238, 238, 238,0.9); margin-top: -10%;"><br>
		<?php 
		switch (@$_GET['menu']) {
			case 'masuk':
				include 'lap_masuk.php';
				break;
				case 'keluar':
					include 'lap_keluar.php';
					break;
			case 'disposisi':
				include 'lap_dis.php';
				break;
				case 'buka':
					include 'nampil.php';
					break;
					case 'open':
						include 'nampil2.php';
						break;
			default:include 'lap_masuk.php';
				# code...
				break;
		}
		 ?>
	</div>
</body>
<script type="text/javascript" src="../asset/js/popper.js"></script>
	<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../asset/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../asset/DataTable/js/jquery.dataTables.min.js"></script>
</html>