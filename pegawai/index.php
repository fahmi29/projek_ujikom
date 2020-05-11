<?php 
	// session_start();
	include '../config/konek.php';
	if (!isset($_SESSION['username'])) {
		// echo "<script>alert('Anda Belum Login');document.location.href='../index.php'</script>";
		header('location:../index.php');
	}
	if ($_SESSION['level'] != "Pegawai") {
		echo "<script>history.back()</script>";
		// mysql_error();
	}
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
		background-image: url(../asset/img/00585a3568a0a7d.jpg);
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
		margin-top: -3%;
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
						echo '<img src="data:image/jpeg;base64,'.base64_encode($select['image']).'" style="width:40px; height:40px; border-radius:50%; margin-right:0px;" id="dropdownMenuButton" data-toggle="dropdown" class="btn-outline-primary">';
					?>
			<div class="dropdown-menu" arialabelledby="dropdownMenuButton" style="margin-left: 75%; border-color: transparent; width: 25%;">
				<!-- <div class="rucing" arialabelledby="dropdownMenuButton" style="margin-left: 81%; top: -9%;"></div> -->
				<ul style="border-bottom: 1px solid #e5e5e5; margin-top: 5%;">
					 <?php 
					 	$id = $_SESSION['user_id'];
						$sql = mysql_query("SELECT * FROM user where id ='$id'");
						$select = mysql_fetch_array($sql);
						echo '<img src="data:image/jpeg;base64,'.base64_encode($select['image']).'" style="width:60px; height:60px; border-radius:50%; margin-right: 0px;">';
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
		<?php 
		$p = mysql_query("SELECT count(id) as total from disposition where reply_at = '$_SESSION[fullname]'");
		$data = mysql_fetch_assoc($p);
		 ?>
		<a href="?menu=masuk" class="nav-link active">Surat Masuk <i>(<?= $data['total'] ?>)</i></a>
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