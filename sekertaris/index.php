<?php
	// session_start();
	// error_reporting(0);
	include '../config/konek.php';
	if (!isset($_SESSION['username'])) {
		// echo "<script>alert('Anda Belum Login');document.location.href='../index.php'</script>";
		header('location:../index.php');
	}
	@$from = mysql_escape_string($_POST['from']);
	if ($_SESSION['level'] != "Sekertaris") {
		echo "<script>history.back()</script>";
		// mysql_error();
	}
	if (isset($_POST['send'])) {
		$upload = addslashes(fread(fopen($_FILES['upload']['tmp_name'], 'r'), $_FILES['upload']['size']));
		// if (empty($_POST['tgl'])||empty($_POST['code'])||empty($_POST['date'])||empty($_POST['from'])||empty($_POST['to'])||empty($_POST['sub'])||empty($_POST['descrip'])||empty($_POST['upload'])||empty($_POST['tipe'])||empty($_POST['stat'])) {
		// 	echo "<script>alert('Jangan Ada Yang Kosong')</script>";
		// }else{
		$boa = mysql_query("INSERT into mail values(null,'$_POST[tgl]','$_POST[code]','$_POST[date]','$from','$_POST[to]','$_POST[sub]','$_POST[descrip]','$upload','".$_FILES['upload']['name']."','".$_FILES['upload']['type']."','".$_FILES['upload']['size']."','$_POST[tipe]',null,'$_POST[stat]','b','t')");
		$lianzatamvan = mysql_fetch_array(mysql_query("SELECT * FROM mail WHERE mail_code = '$_POST[code]'"));
		if ($lianzatamvan) {
			echo "<script>alert('data sudah ada');document.location.href='index.php?menu=tulis'</script>";
			echo mysql_error();
		}
		elseif ($boa == true) {
			echo "<script>alert('Berhasil Dikirim');document.location.href='index.php'</script>";
		}else{
			// echo "<script>alert('Gagal'".mysql_error().");document.location.href='index.php'</script>";
			echo mysql_error();
		}
		//  if ($_POST['code'] == $boa[]) {
		//  	echo "<script>alert('Data Sudah Tersedia');document.location.href='index.php?menu=tulis'</script>";
		// }
	}

	// if (isset($_POST['chk'])) {
	// 	$p = md5($_GET['id']);
	// 	$chek = $_POST['chk'];
	// 	$jum = count($chek);
	// 	for ($i=0; $i <$jum ; $i++) {
	// 		mysql_query("INSERT into disposition values(null,'$_POST[tgl]','$chek[$i]','$_POST[desk]','$_POST[noti]','$_GET[id]','$_SESSION[user_id]','$_POST[stat]',null)");
	// 	}
	// 	echo "<script>alert('Berhasil Dikirim');document.location.href='index.php'</script>";
	// 	// echo mysql_error();
	// }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Surat</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/DataTable/css/jquery.dataTables.min.css">
</head>
<style type="text/css">
	body{
		background-image: url(../asset/img/minimalism-1517556456443-1986.jpg);
		background-size: 100%;
		overflow:hidden;
	}
	.misah{
		height: 2em;
		border-bottom: 1px solid #e5e5e5;
	}
	.sorangan{
		width: 82.9%;
		height: 34em;
		background-color: rgba(238, 238, 238,0.9);
		margin-left: 17%;
		margin-top: -11%;
		overflow-y: auto;
		overflow-x: hidden;
	}
/*	.runcing{
		border-color: transparent;
		border-bottom-color: #fff;
		border-style: dashed dashed solid;
		width: 0 8.5px 8.5px;
		position: absolute;
		top: -9%;
		margin-left: 81%;
	}*/
</style>
<body>
	<nav class="navbar navbar-light" style="background-color: rgba(191, 191, 191,0);">
		<a class="navbar-brand" href="#" style="color: white;"><img src="../asset/img/logorhivoeh.png" alt="" style="width: 50px; height: 50px;"> RhiVoEh</a>

			<?php
					 	$id = $_SESSION['user_id'];
						$sql = mysql_query("SELECT * FROM user where id ='$id'");
						$select = mysql_fetch_array($sql);
						// header("Content-type:image/png");
						// echo '<img src="data:image/jpeg;base64,'.base64_encode($select['image']).'" style="width:40px; height:40px; border-radius:50%;" id="dropdownMenuButton" data-toggle="dropdown" class="btn-outline-info">';
						echo '<img src="data:image/jpeg;base64,'.base64_encode($select['image']).'" style="width:40px; height:40px; border-radius:50%;" id="dropdownMenuButton" data-toggle="dropdown" class="btn-outline-info">';
					?>
			<div class="dropdown-menu" arialabelledby="dropdownMenuButton" style="margin-left: 75%; border-color: transparent; width: 25%;">
				<!-- <div class="rucing" arialabelledby="dropdownMenuButton" style="margin-left: 81%; top: -9%;"></div> -->
				<ul style="border-bottom: 1px solid #e5e5e5; margin-top: 5%;">
					 <?php
					 	$id = $_SESSION['user_id'];
						$sql = mysql_query("SELECT * FROM user where id ='$id'");
						$select = mysql_fetch_array($sql);
						// header("Content-type:image/png");
						// echo '<img src="data:image/jpeg;base64,'.base64_encode($select['image']).'" style="width:60px; height:60px; border-radius:50%; margin-right:0px;">';
						echo '<img src="data:image/jpeg;base64,'.base64_encode($select['image']).'" style="width:60px; height:60px; border-radius:50%; margin-right:0px;">';
					 echo $_SESSION['fullname']; ?>
				</ul>
				<a href="../config/konek.php?op=out" class="btn btn-danger" style="float: right; margin-right: 3%;" ><i class="fa fa-power-off"></i></a>
			</div>

	</nav>
	<div class="misah">
		<a href=""></a>
	</div>
	<br>
	<div class="col-md-2">
	 <div class="nav flex-column nav-pills">
		<center><a href="?menu=tulis" class="nav-link active"><i class="fa fa-cloud"></i> Upload Surat Baru</a></center><br>
		<?php
		$p = mysql_query("SELECT count(id) as total from mail where status = 'in'");
		$data = mysql_fetch_assoc($p);
		?>
		<a href="?menu=masuk" class="nav-link" style="color: white">Surat Masuk <i>(<?= $data['total']; ?>)</i></a>
		<?php
		$s = mysql_query("SELECT count(id) as op from mail where status = 'out'");
		$d = mysql_fetch_assoc($s);
		?>
		<a href="?menu=keluar" class="nav-link" style="color: white">Surat Keluar <i>(<?= $d['op']; ?>)</i></a>
	</div>
	</div>

	<div class="sorangan">
		<div class="tab-content">
			<div class="tab-pane fade show active"><br>
				<?php
				switch (@$_GET['menu']) {
						case 'tulis':
							include 'tulis.php';
							break;
					case 'masuk':
						include 'masuk.php';
						break;
						case 'disposisi':
							include 'disposisi.php';
							break;
							case 'buka':
								include 'nampil.php';
								break;
								case 'disposisi1':
									include 'keluar.php';
									break;
									case 'keluar':
										include 'keluar1.php';
										break;
					default:include 'masuk.php';
						break;
				}
				 ?>

			</div>
		</div>
	</div>



	</div>
</body>
<script type="text/javascript" src="../asset/js/popper.js"></script>
<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../asset/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../asset/DataTable/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable').DataTable();
	});
</script>
</html>
